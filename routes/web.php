<?php

/**
 * 
 * Login Routes
 */

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@verifyLogin')->name('Login');
Route::get('/logout', 'LoginController@Logout')->name('logout');

Route::get('/forgot', 'LoginController@forgot')->name('forgot');
Route::post('/forgotsendtoken', 'LoginController@forgotsendtoken')->name('forgot.sendtoken');
Route::get('/forgotresetpass', 'LoginController@forgotresetpass')->name('forgot.resetpass');
Route::post('/forgotresetpassword', 'LoginController@forgotresetpassword')->name('forgot.resetpassword');


// register routes
Route::get('/signup', 'LoginController@SignUp')->name('SignUp');
Route::post('signup', 'LoginController@registerStepOne')->name('SignUp');
Route::get('/verify/{mobile?}', 'LoginController@verifyRegister')->name('SignUp.Verify');
Route::post('/verify', 'LoginController@verifyRegisterSubmit')->name('SignUp.verifySubmit');
Route::get('/registerinformation', 'LoginController@registerStepThreeForm')->name('SignUp.Final');
Route::post('/registerinformation', 'LoginController@registerStepThree')->name('SignUp.Final');
Route::get('auth/google', 'LoginController@redirectToGoogle')->name('SignUp.Google');
Route::get('auth/google/callback', 'LoginController@handleGoogleCallback')->name('SignUp.Google.Callback');

// panel routes
Route::get('/', 'Front\IndexController@Index')->name('BaseUrl');

Route::get('/1', 'Front\IndexController@index')->name('sfs');
Route::get('/content/{id}', 'Front\PostController@index')->name('ShowItem');
Route::get('/policies/{slug?}', 'MainController@policies')->name('Policies');
Route::get('/category/{slug}', 'Front\CategoryController@show')->name('Category');
Route::get('filterdata', 'Front\CategoryController@FilterData')->name('FilterData');
Route::get('filterwithname', 'Front\CategoryController@FilterWithName')->name('FilterWithName');
Route::get('/content/{id}/episode/{ep}', 'Front\PostController@episode')->name('ShowItem.Episode');
Route::get('/contact-us', 'MainController@ContactUs')->name('ContactUs');
Route::get('/advert', 'MainController@Advert')->name('Advert');

// Channel Routes
Route::get('channel/{name}/content/{slug?}', 'Front\ProfileController@Show')->name('User.Show');
Route::get('channel/{name}/about', 'Front\ProfileController@About')->name('User.About');
Route::get('channels', 'Front\ChannelController@List')->name('Channels.List');
Route::post('/follow', 'Front\ProfileController@Follow')->name('User.Follow');
Route::get('channel/{name}/{category}/{subject}', 'Front\ChannelController@ShowAll')->name('Channel.Category.ShowAll');


// routes where must login

Route::middleware('auth')->group(function () {
    Route::get('/panel/dashboard', 'Panel\DashboardController@index')->name('Panel.Dashboard');
    Route::get('/panel/upload', 'Panel\DashboardController@UploadFile')->name('UploadFile');
    Route::post('/panel/upload', 'Panel\DashboardController@SubmitUploadFile')->name('sUploadFile');
    
    Route::get('/panel/{id}/episode', 'Panel\DashboardController@UploadEpisode')->name('Tutorial.CreateEpisode');
    Route::get('/panel/profile', 'Panel\DashboardController@Profile')->name('Profile');
    Route::post('/panel/profile/Submit', 'Panel\DashboardController@ProfileSave')->name('Profile.Submit');
    Route::get('/panel/users', 'Panel\UserController@index')->name('UsersList');
    Route::get('/panel/myvideos/{content?}', 'Panel\PostsController@MyVideos')->name('MyVideos');
    Route::get('/panel/myaudios/{content?}', 'Panel\PostsController@MyAudios')->name('MyAudios');

    Route::get('/panel/mytutorials/{content?}', 'Panel\PostsController@MyTutorials')->name('MyTutorials');

    Route::get('/panel/unsubscribefiles', 'Panel\PostsController@UnsubscribeFiles')->name('UnsubscribeFiles');
    Route::get('/panel/myfavorites/{content?}', 'Panel\FavoritesController@index')->name('Panel.MyFavorites');
    Route::get('/panel/myfollowers', 'Panel\FollowersController@index')->name('Panel.MyFollowers');
    Route::get('/panel/mycomments', 'Panel\CommentController@myComments')->name('Panel.Comments');
    Route::get('/uploadfile', 'Panel\DashboardController@UploadFile')->name('Main.UploadFile');
    Route::post('addcomment', 'Front\CommentController@AddPostComment')->name('AddComment');
    Route::post('likepost', 'Front\LikeController@LikePost')->name('LikePost');
    Route::post('addtofav', 'Front\FavoriteController@AddFavorite')->name('AddFavorite');
    Route::post('likecomment', 'Front\CommentController@LikeComment')->name('LikeComment');
    Route::post('dislikecomment', 'Front\CommentController@DisLikeComment')->name('DisLikeComment');
    Route::post('/readnoty', 'Panel\PostsController@ReadNoty')->name('Noty.Read');
    Route::post('panel/upload-image', 'Panel\PostsController@UploadImage')->name('UploadImage');
    Route::post('upload/epizode', 'Panel\PostsController@UploadEpizode')->name('UploadEpizode');
    Route::get('notifications', 'Panel\NotificationsController@Index')->name('Notifications');
    Route::get('notifications/read', 'Panel\NotificationsController@Read')->name('Notifications.Read');
    
    Route::get('aboutus/add', 'Panel\MembersController@AddAboutUs')->name('AddAboutUs');
    Route::post('aboutus/add', 'Panel\MembersController@SaveAboutUs')->name('AddAboutUs');


    Route::post('panel/sendmessage', 'Panel\DashboardController@sendmessage')->name('Message.Send');
    Route::get('panel/mymessages', 'Panel\DashboardController@mymessages')->name('Message.My');
    Route::post('post/report', 'Panel\PostsController@report')->name('Post.Report');
    Route::get('panel/mypurchase', 'Panel\PurchaseController@mypurchase')->name('Purchase.My');

    Route::post('pay/startpay', 'Front\PayController@index')->name('Pay.Start');
    Route::get('pay/callback', 'Front\PayController@callback')->name('Pay.CallBack');


    // notes
    Route::post('note/save', 'Panel\NotesController@save')->name('Note.Save');
    
    Route::post('note/delete', 'Panel\NotesController@delete')->name('Note.Delete');

});

// روت های مختص ادمین پنل
Route::middleware(['auth','admin'])->group(function () {
    Route::get('/panel/members/{content?}', 'Panel\MembersController@Index')->name('Panel.Members');
    Route::post('/panel/members/active', 'Panel\MembersController@Active')->name('Panel.Members.Active');
    Route::get('/panel/allposts/unconfirmed', 'Panel\PostsController@unconfirmed')->name('Panel.Posts.Unconfirmed');
    Route::get('/panel/allposts/rejected', 'Panel\PostsController@rejected')->name('Panel.Posts.Rejected');
    Route::post('/panel/confirm', 'Panel\PostsController@confirm')->name('Panel.Posts.Confirm.Submit');
    Route::get('/panel/allposts/category/{content?}', 'Panel\PostsController@Index')->name('Panel.Posts.All');
    Route::get('/panel/reject', 'Panel\PostsController@reject')->name('Panel.Posts.Reject.Submit');
    Route::post('/panel/post/delete', 'Panel\PostsController@Delete')->name('Panel.Post.Delete');
    Route::get('/panel/allcomments/confirm/{id}', 'Panel\CommentController@confirm')->name('Panel.Comments.Confirm.Submit');
    Route::post('/panel/allcomments/unconfirm', 'Panel\CommentController@unconfirm')->name('Panel.Comments.UnConfirm.Submit');
    Route::get('/panel/allcomments/{content?}', 'Panel\CommentController@Index')->name('Panel.Comments.All');
    Route::get('/panel/slideshow/', 'Panel\SlideshowController@Index')->name('Panel.SlideShow.All');
    Route::post('/panel/slideshow/submit', 'Panel\SlideshowController@Submit')->name('Panel.SaveSlideShow');
    Route::post('/panel/slideshow/delete', 'Panel\SlideshowController@Delete')->name('Panel.SlideShow.Delete');
    Route::get('panel/slideshow/create', 'Panel\SlideshowController@CreateSlideShow')->name('Panel.CreateSlideShow');
    
    Route::get('/panel/slideshow/{id}/edit', 'Panel\SlideshowController@EditSlideShow')->name('Panel.EditSlideShow');
    
    Route::post('/panel/slideshow/edit', 'Panel\SlideshowController@SaveEditSlideShow')->name('Panel.SaveEditSlideShow');
    Route::post('/panel/slideshow/count', 'SettingController@CountSlideShow')->name('SlideShow.Count');
    
    Route::get('/panel/bannerpost', 'Panel\ContentController@BannerPost')->name('Panel.BannerPost');
    
    Route::get('/panel/bannerpost/create', 'Panel\ContentController@CreateBannerPost')->name('Panel.CreateBanner');

    Route::post('/panel/ajax/content', 'Panel\ContentController@GetAjaxContent')->name('Panel.GetAjaxContent');
    
        Route::post('/panel/savebanner', 'Panel\ContentController@SaveBannesPost')->name('Panel.SaveBannesPost');

    Route::get('/post/check/{id}', 'Panel\PostsController@CheckPost')->name('Admin.CheckPost');
    Route::get('panel/reports', 'Panel\PostsController@allreport')->name('Post.Report.All');
    Route::post('panel/responsemessage', 'Panel\DashboardController@responsemessage')->name('Message.Response');
    Route::get('panel/messages', 'Panel\DashboardController@messages')->name('Message.All');
    Route::get('panel/allpurchase', 'Panel\PurchaseController@index')->name('Purchase.All');
    Route::get('panel/policies/{type?}', 'Panel\ContentController@Policies')->name('Panel.Policies');
    Route::get('panel/policies/{type?}/edit', 'Panel\ContentController@EditPolicies')->name('Panel.EditPolicies');
    Route::post('panel/savepolicy', 'Panel\ContentController@SavePolicy')->name('Panel.SavaPolicy');
    Route::post('panel/saveditpolicy', 'Panel\ContentController@SaveEditPolicy')->name('Panel.SaveEditPolicy');
    Route::get('panel/contactus', 'Panel\ContentController@ContactUs')->name('Panel.ContactUs');
    Route::get('panel/contactus/edit', 'Panel\ContentController@EditContactUs')->name('Panel.EditContactUs');
    Route::post('panel/savecontactus', 'Panel\ContentController@SaveContactUs')->name('Panel.SaveContactUs');
    Route::post('panel/saveditcontactus', 'Panel\ContentController@SaveEditContactUs')->name('Panel.SaveEditContactUs');
    Route::get('panel/income', 'Panel\ContentController@Income')->name('Panel.Income');
   
    Route::get('panel/advert', 'Panel\ContentController@Advert')->name('Panel.Advert');
    Route::get('panel/editadvert', 'Panel\ContentController@EditAdvert')->name('Panel.EditAdvert');
    Route::post('panel/saveadvert', 'Panel\ContentController@SaveAdvert')->name('Panel.SaveAdvert');
    Route::post('panel/saveditadvert', 'Panel\ContentController@SaveEditAdvert')->name('Panel.SaveEditAdvert');
    Route::post('panel/checkout', 'Front\PayController@Checkout')->name('Panel.Checkout');

    Route::post('panel/membertoadmin', 'Panel\MembersController@chageability')->name('Panel.Member.ChangeAbility');

    Route::post('panel/setcommission', 'SettingController@commission')->name('Panel.commission');

   

});
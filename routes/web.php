<?php

/**
 * 
 * Login Routes
 */

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@verifyLogin')->name('Login');
Route::get('/logout', 'LoginController@Logout')->name('logout');



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
Route::get('/policies', 'MainController@policies')->name('Policies');
Route::get('/category/{slug}', 'Front\CategoryController@show')->name('Category');
Route::get('filterdata', 'Front\CategoryController@FilterData')->name('FilterData');
Route::get('filterwithname', 'Front\CategoryController@FilterWithName')->name('FilterWithName');


// routes where must login

Route::middleware('auth')->group(function () {
    Route::get('/panel/dashboard', 'Panel\DashboardController@index')->name('Panel.Dashboard');
    Route::get('/panel/upload', 'Panel\DashboardController@UploadFile')->name('UploadFile');
    Route::post('/panel/upload', 'Panel\DashboardController@SubmitUploadFile')->name('sUploadFile');
    Route::get('/panel/profile', 'Panel\DashboardController@Profile')->name('Profile');
    Route::post('/panel/profile/Submit', 'Panel\DashboardController@ProfileSave')->name('Profile.Submit');
    Route::get('/panel/users', 'Panel\UserController@index')->name('UsersList');
    Route::get('/panel/myvideos/{content?}', 'Panel\PostsController@MyVideos')->name('MyVideos');
    Route::get('/panel/myaudios/{content?}', 'Panel\PostsController@MyAudios')->name('MyAudios');
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

    // Channel Routes
    Route::get('/{name}', 'Front\ProfileController@Show')->name('User.Videos');
    Route::get('/{name}/about', 'Front\ProfileController@About')->name('User.About');



    Route::post('post/report', 'Panel\PostsController@report')->name('Post.Report');

});

// روت های مختص ادمین پنل
Route::middleware('admin')->group(function () {
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
Route::post('/panel/slideshow/submit', 'Panel\SlideshowController@Submit')->name('Panel.SlideShow.Submit');
Route::post('/panel/slideshow/delete', 'Panel\SlideshowController@Delete')->name('Panel.SlideShow.Delete');

Route::get('/post/check/{id}', 'Panel\PostsController@CheckPost')->name('Admin.CheckPost');

Route::get('panel/reports', 'Panel\PostsController@allreport')->name('Post.Report.All');

});


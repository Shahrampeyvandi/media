<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\UserActivation;
use App\Mail\Welcome;
use App\Mail\SendResetPasswordToken;
use App\Models\ActivationCode;
use App\Models\Members\Members;
use App\Models\Members\PasswordReset;
use App\Models\Students\Student;
use App\Models\Teachers\Teacher;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Socialite;


class LoginController extends Controller
{


    public function index()
    {
        return view('Login.login');
    }

    public function verifyLogin(Request $request)
    {

        if ($member = Members::where('mobile', $request->field)->where('ability', 'admin')->orWhere('ability', 'mid-level-admin')->first()) {


            if (Hash::check($request->pass, $member->password)) {
                Auth::Login($member);
                return redirect()->route('Panel.Dashboard');
            } else {
                $request->session()->flash('Error', 'نام کاربری یا رمز عبور اشتباه است');
                return back();
            }
        }
        if ($request->field == '' || $request->pass == '') {
            $request->session()->flash('Error', 'اطلاعات را به صورت کامل وارد نمایید');
            return back();
        }
       

        if (filter_var($request->field, FILTER_VALIDATE_EMAIL)) {
            $member = Members::where('email',$request->field)->first();
            if ($member) {

                if (Hash::check($request->pass,$member->password)) {

                    Auth::Login($member);
                    return redirect()->route('Panel.Dashboard');
                } else {
                    $request->session()->flash('Error', 'رمز عبور وارد شده صحیح نمی باشد');
                    return back();
                }
            } else {
                $request->session()->flash('Error', 'کاربری با این ایمیل وجود ندارد');
                return back();
            }
        } elseif (preg_match("/^09[0-9]{9}$/", $request->field)) {
            // $member = Members::where('mobile', $request->field)->where('group', $request->user_role)->first();
            // if ($member) {
            //     if (Hash::check($request->pass, $member->password)) {
            //         Auth::Login($member);
            //         return redirect()->route('BaseUrl');
            //     } else {
            //         $request->session()->flash('Error', 'نام کاربری یا رمز عبور اشتباه است');
            //         return back();
            //     }
            // } else {
            //     $request->session()->flash('Error', 'کاربری با این شماره موبایل وجود ندارد');
            //     return back();
            // }
            $request->session()->flash('Error', 'اطلاعات وارد شده صحیح نمی باشد');
            return back();
        } else {
            $member = Members::where('username', $request->field)->first();
            if ($member) {

                if (Hash::check($request->pass,$member->password)) {

                    Auth::Login($member);
                    return redirect()->route('Panel.Dashboard');
                } else {
                    $request->session()->flash('Error', 'رمز عبور وارد شده اشتباه می باشد');
                    return back();
                }
            } else {
                $request->session()->flash('Error', 'کاربری با این شناسه وجود ندارد');
                return back();
            }
        }
    }




    public function SignUp(Request $request)
    {
        return view('Login.register_step_one');
    }
    public function registerStepOne(Request $request)
    {
        if ($member = Members::where('email', $request->mobile)->first()) {
            $request->session()->flash('Error', 'با این ایمیل قبلا در سایت ثبت نام کرده اید');
            return back();
        }
        $code = ActivationCode::createCode($request->mobile);
        if ($code == false) {
            $request->session()->flash('Error', 'کد فعال سازی قبلا به ایمیل شما ارسال شده است برای دریافت مجدد کد بعد از 10 دقیقه مجددا تلاش کنید');
            return back();
        }
        if (filter_var($request->mobile, FILTER_VALIDATE_EMAIL)) {

            event(new UserActivation($request->mobile, $code));
            session()->put('email', $request->mobile);
            session()->put('success_step1','success');
            return  redirect()->route('SignUp.Verify', $request->mobile);
        } elseif (preg_match("/^09[0-9]{9}$/", $request->mobile)) {
            // event(new UserActivation($request->mobile,$code));
            // session()->put('mobile', $request->mobile);
            // return  redirect()->route('SignUp.Verify', $request->mobile);
            $request->session()->flash('Error', 'در حال حاضر امکان استفاده از شماره موبایل وجود ندارد');
            return back();
        } else {
            $request->session()->flash('Error', 'اطلاعات وارد شده صحیح نمی باشد');
            return back();
        }
    }

    public function verifyRegister($id = '')
    {
        if (trim($id) == '') {

            return back();
        }

        return view('Login.register_step_two', compact('id'));
    }

    public function verifyRegisterSubmit(Request $request)
    {
        $activationCode_OBJ = ActivationCode::where('v_code', $request->code)->first();
        if ($activationCode_OBJ) {
            session()->put('success_step2','success');
            return redirect()->route('SignUp.Final');
        } else {
            return back();
        }
    }
    public function registerStepThreeForm()
    {
        $user = null;
        return view('Login.register_step_three', compact('user'));
    }

    public function registerStepThree(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate(
            [
                'user_profile' => 'max:2048',
                'userid' => 'unique:members,username',
                'user_mobile' => 'unique:members,mobile',
            ],
            [
                'user_profile.max' => 'عکس پروفایل نمی تواند بیشتر از دو مگابایت باشد',
                'userid.unique' => 'کاربری با این نام کاربری وجود دارد',
                'user_mobile.unique'    => 'کاربری با این شماره موبایل وجود دارد',

            ]
        );
        if ($request->hasFile('user_profile')) {
            // Upload path
            $destinationPath = public_path('members/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $extension = $request->file('user_profile')->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowed = array('jpeg', 'jpg', 'png', 'gif');
            if (!in_array($ext, $allowed)) {
                $request->session()->flash('Error', 'فرمت تصویر نامعتبر میباشد');
                return back();
            }
            $request->file('user_profile')->move($destinationPath, $fileName);
            $filePath = 'members/' . $fileName;
        } else {
            $filePath = null;
        }
        try {
            $member = new Members();
            if ($request->googleid) {
                $member->email = $request->email;
                $member->google_id = $request->googleid;
            } else {
                $member->email = session()->get('email');
            }
            $member->firstname = $request->user_name;
            $member->lastname = $request->user_family;
            $member->avatar = $filePath;
            $member->mobile = $request->user_mobile;
            $member->username = $request->userid;
            $member->password = Hash::make($request->user_pass);
            $member->age = $request->age;
            $member->history = $request->user_history;
            $member->books = $request->books;
            $member->years = $request->user_sanavat;
            $member->certificate = $request->user_certificate;
            $member->edu_level = $request->user_level;
            $member->active = 1;    
            $member->group = $request->user_role;
            $member->ability = 'member';
            $member->save();
            Auth::Login($member);
            Mail::to($member->email)->send(
                new Welcome()
            );
            session()->put('success_step3','success');
            toastr()->success('به ژن برتر خوش آمدید');
            return redirect()->route('Panel.Dashboard');

        } catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash('Error', 'ذخیره اطلاعات با مشکل مواجه شد');
            return back();
        }
    }

    public function Logout()
    {
        Auth::logout();
        return redirect()->route('BaseUrl');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = Members::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->route('Panel.Dashboard');
            } else {


                return view('Login.register_step_three', compact('user'));

                // $newUser = User::create([
                //     'name' => $user->name,
                //     'email' => $user->email,
                //     'google_id'=> $user->id,
                //     'password' => encrypt('123456dummy')
                // ]);
                //    $member = new Members();
                // $member->firstname = $user->name;
                // $member->lastname = $user->name;
                // $member->password = Hash::make('123456dummy');
                // $member->email = $user->email;
                // $member->google_id = $user->id;
                // $member->save();

                //         Auth::login($member);

                //         return redirect('/home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    public function forgot()
    {
        return view('Login.forgot');
    }

    public function forgotsendtoken(Request $request)
    {

        $member=Members::where('email',$request->email)->first();

        if(is_null($member)){

            $request->session()->flash('Error', 'این ایمیل در سایت وجود ندارد');

            return back();

        }

        $passreset=new PasswordReset;
        $passreset->email=$member->email;
        $passreset->token=md5(uniqid($member->email.microtime(), true));;
        $passreset->save();

        Mail::to($member->email)->send(
            new SendResetPasswordToken($member->email,$passreset->token)
        );

        //event(new UserActivation($request->mobile, $code));


        $request->session()->flash('Error', 'ایمیل بازیابی رمز عبور برای شما ارسال گردید!');

        return back();
    }

    public function forgotresetpass(Request $request)
    {


       


        return view('Login.resetpassword');
    }

}

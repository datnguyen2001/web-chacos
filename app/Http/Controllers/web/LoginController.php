<?php

namespace App\Http\Controllers\web;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\NoSpaceRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login()
    {
        return view('web.login');
    }

    public function registration()
    {
        return view('web.registration');
    }

    public function signUp(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'first_name' => 'required|string|max:20',
                'last_name' => 'required|string|max:20',
                'email' => 'required|email|unique:users,email|max:30',
                'email_confirmed' => 'required|email|same:email',
                'password' => ['required', 'string', 'min:8', 'regex:/[A-Z]/', 'regex:/[a-z]/', 'regex:/[0-9]/', 'regex:/[\W]/', new NoSpaceRule],
                'password_confirmed' => ['required', 'same:password']
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            User::create([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'status' => UserStatus::ACTIVE,
            ]);

            toastr()->success('Đăng ký thành công với email ' . $validatedData['email']);
            return redirect()->route('login');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back()->withInput();
        }
    }

    public function signIn(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email|max:30',
                'password' => ['required', 'min:8', new NoSpaceRule],
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $email = $validatedData['email'];
            $password = $validatedData['password'];

            $user = User::where('email', $email)->first();

            if ($user && Hash::check($password, $user->password)) {
                if ($user->status == 1) {
                    Auth::login($user, $request->has('remember'));

                    toastr()->success('Welcome ' . $user->first_name . ' ' . $user->last_name);
                    return redirect()->intended(route('home'));
                } else {
                    toastr()->error("Your account is not activated yet");
                    return back()->withInput();
                }
            }

            toastr()->error("Wrong email or password");
            return back()->withInput();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back()->withInput();
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            toastr()->success('Goodbye & Hope to you again');
            return redirect()->route('home');
        }
        toastr()->success('Something when wrong');
        return back();
    }
}

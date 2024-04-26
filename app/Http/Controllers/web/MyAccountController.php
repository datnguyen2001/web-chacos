<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\NoSpaceRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MyAccountController extends Controller
{
    public function index()
    {
        return view('web.my-account.index');
    }

    public function editAccount()
    {
        return view('web.my-account.edit-account');
    }

    public function updateAccount(Request $request, $id)
    {
        try {
            $validated = Validator::make($request->all(), [
                'first_name' => 'required|string|max:20',
                'last_name' => 'required|string|max:20',
                'email' => 'required|email|max:30|unique:users,email,' . $id,
                'email_confirmed' => 'required|email|same:email',
                'current_password' => 'required|string',
                'password' => ['required', 'string', 'min:8', 'regex:/[A-Z]/', 'regex:/[a-z]/', 'regex:/[0-9]/', 'regex:/[\W]/', new NoSpaceRule],
                'password_confirmed' => ['required', 'same:password']
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $currentPassword = $validatedData['current_password'];

            $user = User::findOrFail($id);

            if (Hash::check($currentPassword, $user->password)) {
                $user->update([
                    'first_name' => $validatedData['first_name'],
                    'last_name' => $validatedData['last_name'],
                    'email' => $validatedData['email'],
                    'password' => Hash::make($validatedData['password'])
                ]);
            } else {
                toastr()->success("Bạn đã nhập sai mật khẩu cũ");
                return back();
            }

            toastr()->success("Chỉnh sửa thông tin thành công");
            return back();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back()->withInput();
        }
    }

    public function address()
    {
        return view('web.my-account.address');
    }

    public function orderHistory()
    {
        return view('web.my-account.order-history');
    }

    public function wishlist()
    {
        return view('web.wishlist.index');
    }
}

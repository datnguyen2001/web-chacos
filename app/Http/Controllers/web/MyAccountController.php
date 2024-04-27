<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use App\Rules\NoSpaceRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MyAccountController extends Controller
{
    public function index()
    {
        $address = Address::where('user_id', Auth::user()->id)->where('isDefault', 1)->first();
        return view('web.my-account.index')->with(compact('address'));
    }

    public function editAccount()
    {
        return view('web.my-account.edit-account');
    }

    public function updateAccount(Request $request, $id)
    {
        try {
            $validated = Validator::make($request->all(), [
                'first_name'            => 'required|string|max:20',
                'last_name'             => 'required|string|max:20',
                'email'                 => 'required|email|max:30|unique:users,email,' . $id,
                'email_confirmed'       => 'required|email|same:email',
                'current_password'      => 'required|string',
                'password'              => ['required', 'string', 'min:8', 'regex:/[A-Z]/', 'regex:/[a-z]/', 'regex:/[0-9]/', 'regex:/[\W]/', new NoSpaceRule],
                'password_confirmed'    => ['required', 'same:password']
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
                    'first_name'    => $validatedData['first_name'],
                    'last_name'     => $validatedData['last_name'],
                    'email'         => $validatedData['email'],
                    'password'      => Hash::make($validatedData['password'])
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
        $addresses = Address::where('user_id', Auth::user()->id)->orderBy('isDefault', 'desc')->orderBy('id', 'desc')->get();

        return view('web.my-account.address')->with(compact('addresses'));
    }

    public function storeAddress(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'name'          => 'nullable|string|max:100',
                'first_name'    => 'required|string|max:30',
                'last_name'     => 'required|string|max:30',
                'address'       => 'required|string|max:100',
                'address_2'     => 'nullable|string|max:100',
                'city'          => 'required|string|max:30',
                'phone'         => ['required', 'unique:addresses,phone,' . Auth::user()->id . ',user_id', 'regex:/^0[1-9][0-9]{8}$/'],
                'isDefault'     => 'nullable',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                session()->flash('open_store_modal', true);
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $validatedData['user_id'] = Auth::user()->id;

            $isDefault = isset($validatedData['isDefault']) && $validatedData['isDefault'] == "on" ? 1 : 0;

            if ($isDefault == 1) {
                //Set all address to not default
                $getAddresses = Address::where('user_id', $validatedData['user_id'])->get();
                foreach ($getAddresses as $add) {
                    $add->isDefault = 0;
                    $add->save();
                }
            }

            Address::create([
                'user_id'       => $validatedData['user_id'],
                'name'          => $validatedData['name'],
                'first_name'    => $validatedData['first_name'],
                'last_name'     => $validatedData['last_name'],
                'address'       => $validatedData['address'],
                'address_2'     => $validatedData['address_2'],
                'city'          => $validatedData['city'],
                'phone'         => $validatedData['phone'],
                'isDefault'     => $isDefault
            ]);

            toastr()->success("Tạo mới địa chỉ thành công");
            return back();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            session()->flash('open_store_modal', true);
            return back()->withInput();
        }
    }

    public function updateAddress(Request $request, $id)
    {
        try {
            $validated = Validator::make($request->all(), [
                'name'          => 'nullable|string|max:100',
                'first_name'    => 'required|string|max:30',
                'last_name'     => 'required|string|max:30',
                'address'       => 'required|string|max:100',
                'address_2'     => 'nullable|string|max:100',
                'city'          => 'required|string|max:30',
                'phone'         => ['required', 'unique:addresses,phone,' . $id . ',id', 'regex:/^0[1-9][0-9]{8}$/'],
                'isDefault'     => 'nullable',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                session()->put('show_update_modal_ids', [$id]);
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $isDefault = isset($validatedData['isDefault']) && $validatedData['isDefault'] == "on" ? 1 : 0;

            if ($isDefault == 1) {
                //Set all address to not default
                $getAddresses = Address::where('user_id', Auth::user()->id)->get();
                foreach ($getAddresses as $add) {
                    $add->isDefault = 0;
                    $add->save();
                }
            }

            $address = Address::findOrFail($id);

            $address->update([
                'name'          => $validatedData['name'],
                'first_name'    => $validatedData['first_name'],
                'last_name'     => $validatedData['last_name'],
                'address'       => $validatedData['address'],
                'address_2'     => $validatedData['address_2'],
                'city'          => $validatedData['city'],
                'phone'         => $validatedData['phone'],
                'isDefault'     => $isDefault
            ]);

            toastr()->success("Chỉnh sửa địa chỉ thành công");
            return back();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            session()->put('show_update_modal_ids', [$id]);
            return back()->withInput();
        }
    }

    public function destroyAddress($id)
    {
        try {
            if (!$id) {
                return response()->json(['error' => -1, 'message' => "Id is không được trống"], 400);
            }

            $address = Address::find($id);

            if (!$address) {
                return response()->json(['error' => -1, 'message' => "Not found address"], 400);
            }

            $address->delete();

            return response()->json(['error' => 0, 'message' => "Xoá địa chỉ thành công"]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
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

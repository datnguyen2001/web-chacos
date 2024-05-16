<?php

namespace App\Http\Controllers\admin;

use App\Enums\CouponStatus;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\ProductModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_menu = 'coupon';

        $coupons = Coupon::orderBy('status', 'desc')->orderBy('id', 'desc')->get();

        $products = ProductModel::all();

        return view('admin.coupon.index')->with(compact('page_menu', 'coupons', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'code' => 'required|string|unique:coupons,code',
                'discount' => 'required|numeric|min:0',
                'discount_type' => 'required|in:percent,amount',
                'details' => 'required|string',
                'product_ids' => 'nullable',
                'status' => 'nullable',
                'date' => [
                    'required',
                    'regex:/^\d{2}\/\d{2}\/\d{4}\s-\s\d{2}\/\d{2}\/\d{4}$/',
                    function ($attribute, $value, $fail) {
                        [$startDate, $endDate] = explode(' - ', $value);

                        if (!Carbon::createFromFormat('d/m/Y', $startDate) || !Carbon::createFromFormat('d/m/Y', $endDate)) {
                            $fail("The $attribute format is invalid.");
                        }
                    },
                ],
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            // STATUS
            if (isset($validatedData['status']) && $validatedData['status'] == 'on') {
                $validatedData['status'] = CouponStatus::ACTIVE;
            } else {
                $validatedData['status'] = CouponStatus::INACTIVE;
            }

            // PRODUCT IDS
            if (isset($validatedData['product_ids'])) {
                $validatedData['product_ids'] = implode(',', $validatedData['product_ids']);
            }

            // DATE
            [$startDateString, $endDateString] = explode(' - ', $validatedData['date']);
            // Convert start date to the desired format
            $startDate = Carbon::createFromFormat('d/m/Y', $startDateString)->startOfDay();
            $startDateTimeFormatted = $startDate->format('Y-m-d H:i:s');
            $validatedData['start_date'] = $startDateTimeFormatted;

            // Convert end date to the desired format
            $endDate = Carbon::createFromFormat('d/m/Y', $endDateString)->endOfDay();
            $endDateTimeFormatted = $endDate->format('Y-m-d H:i:s');
            $validatedData['end_date'] = $endDateTimeFormatted;

            Coupon::create($validatedData);

            toastr()->success("Thêm mã giảm giá thành công");
            return back();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $page_menu = 'coupon';

        $coupon = Coupon::findOrFail($id);

        $products = ProductModel::all();

        return view('admin.coupon.edit')->with(compact('page_menu', 'coupon', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = Validator::make($request->all(), [
                'code' => 'required|string|unique:coupons,code,' . $id,
                'discount' => 'required|numeric|min:0',
                'discount_type' => 'required|in:percent,amount',
                'details' => 'required|string',
                'product_ids' => 'nullable',
                'status' => 'nullable',
                'date' => [
                    'required',
                    'regex:/^\d{2}\/\d{2}\/\d{4}\s-\s\d{2}\/\d{2}\/\d{4}$/',
                    function ($attribute, $value, $fail) {
                        [$startDate, $endDate] = explode(' - ', $value);

                        if (!Carbon::createFromFormat('d/m/Y', $startDate) || !Carbon::createFromFormat('d/m/Y', $endDate)) {
                            $fail("The $attribute format is invalid.");
                        }
                    },
                ],
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $coupon = Coupon::findOrFail($id);

            // STATUS
            if (isset($validatedData['status']) && $validatedData['status'] == 'on') {
                $validatedData['status'] = CouponStatus::ACTIVE;
            } else {
                $validatedData['status'] = CouponStatus::INACTIVE;
            }

            // PRODUCT IDS
            if (isset($validatedData['product_ids'])) {
                $validatedData['product_ids'] = implode(',', $validatedData['product_ids']);
            }

            // DATE
            [$startDateString, $endDateString] = explode(' - ', $validatedData['date']);
            // Convert start date to the desired format
            $startDate = Carbon::createFromFormat('d/m/Y', $startDateString)->startOfDay();
            $startDateTimeFormatted = $startDate->format('Y-m-d H:i:s');
            $validatedData['start_date'] = $startDateTimeFormatted;

            // Convert end date to the desired format
            $endDate = Carbon::createFromFormat('d/m/Y', $endDateString)->endOfDay();
            $endDateTimeFormatted = $endDate->format('Y-m-d H:i:s');
            $validatedData['end_date'] = $endDateTimeFormatted;

            $coupon->update($validatedData);

            toastr()->success("Update coupon successfully");
            return back();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            if (!$id) {
                return response()->json(['error' => -1, 'message' => "Id is null"], 400);
            }

            $coupon = Coupon::find($id);

            if (!$coupon) {
                return response()->json(['error' => -1, 'message' => "Not found coupon"], 400);
            }

            $coupon->delete();

            return response()->json(['error' => 0, 'message' => "Success remove coupon"]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }
}

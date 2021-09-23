<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CouponModel;

class CouponController extends Controller
{
    // Coupon Function start
        public function ViewCoupon(){
            $totalCoupon = CouponModel::all();
            return view('admin.coupon.index',compact('totalCoupon'));
        }
        public function GetALLFeatureDeleteCoupon(Request $request){
            if (count($request->feature) > 0) {
                for ($i = 0; $i < count($request->feature); $i++) {
                    $data = CouponModel::where('id',$request->feature[$i])->first();
                    if($request->submit == "delete"){
                        $data->delete();
                    }
                }
            }else{
                $danger = "Your didn't select any row.";
                $request->session()->put("danger",$danger);
            }
            return back();
        }
        public function AddCoupon(){
            return view('admin.coupon.add');
        }
        public function AddCouponProcess(Request $request){
            $data = $request->all();
            $Coupon = new CouponModel;
            $Coupon->fill($data);
            $Coupon->save();
            $success = "Your Data has Saved successfully.";
            $request->session()->put("success",$success);
            return back();
        }
        public function DeleteCoupon(Request $request,$id){
            $data = CouponModel::find($id);
            $data->delete();
            $danger = "Your Data has been Delete successfully.";
            $request->session()->put("danger",$danger);
            return back();
        }
        public function EditCoupon(Request $request, $id){
            $data = CouponModel::find($id);
            return view('admin.coupon.edit',compact('data'));
        }
        public function EditCouponProcess(Request $request, $id){
            $data = $request->all();
            $Coupon = CouponModel::find($id);
            $Coupon->fill($data);
            $Coupon->save();
            $success = "Your Data has been Updated successfully.";
            $request->session()->put("success",$success);
            return back();
        }
    
    // Coupon Function end


    // Coupon apply Function start
        public function CouponApply(Request $request){
            $couponCode = $request->couponCode;
            $coupon = CouponModel::where('code',$couponCode)->first();
            if($coupon){
                $status = 1;
                $discountPerct = $coupon->discount;
                if ($coupon->endDate != null) {
                    $endDate = $coupon->endDate;
                    $curdate=date("Y-m-d");
                    if($curdate < $endDate)
                    {
                        $request->session()->put("couponApplySuccess",$discountPerct);
                        return back();
                    }else{
                        $status = 0;
                    }
                }
                if ($coupon->userLimit != null && $status == 1) {
                    $userLimit = $coupon->userLimit;
                    $userUse = $coupon->userUse;
                    if ($userLimit > $userUse) {
                        $coupon->userUse += 1;
                        $coupon->save();
                        $request->session()->put("couponApplySuccess",$discountPerct);
                        return back();
                    }
                }
                return back()->with("error","This Coupon is Expired.");
            }else{
                return back()->with("error","No Coupon Exist.");
            }
        }
    // Coupon apply Function end
}

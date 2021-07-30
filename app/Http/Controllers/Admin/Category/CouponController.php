<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Newsletter;

class CouponController extends Controller
{
public function CouponView(){
$coupon = Coupon::latest()->get();
return view('backend.coupon.coupon_view',compact('coupon'));
    }//end method

public function CouponStore(Request $request){
$request->validate([
    'coupon' => 'required',
     'discount' => 'required',
    
],[
 'coupon' => 'Input Coupon name',
 'discount' => 'Input coupon discount',
 
]);

Coupon::insert([
'coupon' => $request->coupon,
'discount' => $request->discount,


]);
$notification = array(
'message' => 'Coupon added successfully',
'alert-type' => 'success'
);
return redirect()->back()->with($notification);

    }//end method

 public function CouponEdit($id){
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.coupon_edit',compact('coupon'));
    }// end methode

public function CouponUpdate(Request $request){

$cat_id = $request->id;

Coupon::findOrFail($cat_id)->update([
'coupon' => $request->coupon,
'discount' => $request->discount,
]);
$notification = array(
'message' => 'Coupon updated successfully',
'alert-type' => 'success'
);
return redirect()->route('manage-coupon')->with($notification);

    }//end method


public function CouponDelete($id){

    Coupon::findOrFail($id)->delete();
    $notification = array(
'message' => 'Coupon deleted successfully',
'alert-type' => 'success'
);
return redirect()->back()->with($notification);
}//end method


public function NewsletterView(){
$newsletter = Newsletter::latest()->get();
return view('backend.coupon.newsletter_view',compact('newsletter'));
    }//end method
public function NewsletterDelete($id){

    Newsletter::findOrFail($id)->delete();
    $notification = array(
'message' => 'Subsriber deleted successfully',
'alert-type' => 'success'
);
return redirect()->back()->with($notification);
}//end method

}

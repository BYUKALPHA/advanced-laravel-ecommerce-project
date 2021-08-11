<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;
use DB;

class ItemController extends Controller
{
public function AllItem(){
$products = DB::table('items')
                 ->join('categories','items.category_id','categories.id')
                 ->join('brands','items.brand_id','brands.id')
                 ->select('items.*','categories.category_name_en','brands.brand_name_en')
                 ->get();
return view('backend.item.item_view',compact('products'));
}//end method

public function AddItem(){
 $categories = DB::table('categories')->latest()->get();
 $brands = DB::table('brands')->get();
 return view('backend.item.item_add',compact('categories','brands'));
}//end method

public function Itemstore(Request $request){
    $data['category_id'] = $request->category_id;
    $data['subcategory_id'] = $request->subcategory_id;
    $data['brand_id'] = $request->brand_id;
    $data['product_name'] = $request->product_name;
    $data['product_code'] = $request->product_code;
    $data['product_quantity'] = $request->product_quantity;
    $data['product_details'] = $request->product_details;
    $data['product_color'] = $request->product_color;
    $data['product_size'] = $request->product_size;
    $data['selling_price'] = $request->selling_price;
    $data['discount_price'] = $request->discount_price;
    $data['video_link'] = $request->video_link;
    $data['main_slider'] = $request->main_slider ;
    $data['hot_deal'] = $request->hot_deal;
    $data['best_rated'] = $request->best_rated;
    $data['mid_slider'] = $request->mid_slider;
    $data['hot_new'] = $request->hot_new;
    $data['trend'] = $request->trend;
    $data['status'] = 1;
   
    $image_one = $request->image_one;
    $image_two = $request->image_two;
    $image_three = $request->image_three;
if ($image_one && $image_two && $image_three){
  $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
  Image::make($image_one)->resize(300,300)->save('upload/products/'.$image_one_name);
  $data['image_one'] = 'upload/products/'.$image_one_name;

  $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
  Image::make($image_two)->resize(300,300)->save('upload/products/'.$image_two_name);
  $data['image_two'] = 'upload/products/'.$image_two_name;  

  $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
  Image::make($image_three)->resize(300,300)->save('upload/products/'.$image_three_name);
  $data['image_three'] = 'upload/products/'.$image_three_name;
$product = DB::table('items')->insert($data);
$notification = array(
        'message' => 'Product inserted Successfully',
        'alert-type' => 'success'
                );
return redirect()->route('all-item')->with($notification);


}//end if
    
}//end method
public function ItemDelete($id){
    $product = DB::table('items')->where('id',$id)->first();
    $image1 = $product->image_one;
    $image2 = $product->image_two;
    $image3 = $product->image_three;
      unlink($image1);
      unlink($image2);
      unlink($image3);

      DB::table('items')->where('id',$id)->delete();

      $notification = array(
      'message' => 'Product Deleted Successfully',
      'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

     }// end method 
public function ItemInactive($id){
DB::table('items')->where('id',$id)->update(['status'=>0]);
 $notification = array(
      'message' => 'Product Successfully inactive',
      'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
} //end method
public function ItemActive($id){
    DB::table('items')->where('id',$id)->update(['status'=>1]);
     $notification = array(
          'message' => 'Product Successfully active',
          'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //end method
public function EditItem($id){  
    $product = DB::table('items')->where('id',$id)->first();
    return view('backend.item.item_edit',compact('product'));
    }//end method 

public function ViewItem($id){
$product = DB::table('items')
                 ->join('categories','items.category_id','categories.id')
                 ->join('sub_categories','items.subcategory_id','sub_categories.id')
                 ->join('brands','items.brand_id','brands.id')
                 ->select('items.*','categories.category_name_en','brands.brand_name_en','sub_categories.subcategory_name_en')
                 ->where('items.id',$id)
                 ->first();
return view('backend.item.show_item',compact('product'));
}// end method

public function UpdateProductwithoutphoto (Request $request,$id){
     $data = array();
     $data['category_id'] = $request->category_id;
    $data['subcategory_id'] = $request->subcategory_id;
    $data['brand_id'] = $request->brand_id;
    $data['product_name'] = $request->product_name;
    $data['product_code'] = $request->product_code;
    $data['product_quantity'] = $request->product_quantity;
    $data['product_details'] = $request->product_details;
    $data['product_color'] = $request->product_color;
    $data['product_size'] = $request->product_size;
    $data['selling_price'] = $request->selling_price;
    $data['discount_price'] = $request->discount_price;
    $data['video_link'] = $request->video_link;
    $data['main_slider'] = $request->main_slider ;
    $data['hot_deal'] = $request->hot_deal;
    $data['best_rated'] = $request->best_rated;
    $data['mid_slider'] = $request->mid_slider;
    $data['hot_new'] = $request->hot_new;
    $data['trend'] = $request->trend;    

    $update = DB::table('items')->where('id',$id)->update($data);
    if( $update){
      $notification = array(
      'message' => 'Product Successfully updated',
      'alert-type' => 'success'
    );
    return redirect()->route('all-item')->with($notification);  
    }else{
      $notification = array(
      'message' => 'Nothing to update',
      'alert-type' => 'success'
    );
    return redirect()->route('all-item')->with($notification);    
    }
}//end method

public function Updatephoto(Request $request, $id){
 $old_one = $request->old_one;
 $old_two = $request->old_two;
 $old_three = $request->old_three;

 $data = array();

$image_one = $request->file('image_one');
$image_two = $request->file('image_two');
$image_three = $request->file('image_three');

if ($image_one){
 unlink($old_one);  
$image_name = date('dmy_H_s_i');
$ext = strtolower($image_one->getClientOriginalExtension());
$image_full_name = $image_name.'.'.$ext;
$upload_Path = 'upload/products/';
$image_url = $upload_Path.$image_full_name;
$success = $image_one->move($upload_Path,$image_full_name);

$data['image_one'] = $image_url;
$productimg = DB::table('items')->where('id',$id)->update($data);
$notification = array(
'message' => 'image_one updated successfully',
'alert-type' => 'info'
);
return redirect()->route('all-item')->with($notification);

}//end if condition
if ($image_two){
 unlink($old_two);  
$image_name = date('dmy_H_s_i');
$ext = strtolower($image_two->getClientOriginalExtension());
$image_full_name = $image_name.'.'.$ext;
$upload_Path = 'upload/products/';
$image_url = $upload_Path.$image_full_name;
$success = $image_two->move($upload_Path,$image_full_name);

$data['image_two'] = $image_url;
$productimg = DB::table('items')->where('id',$id)->update($data);
$notification = array(
'message' => 'image two updated successfully',
'alert-type' => 'info'
);
return redirect()->route('all-item')->with($notification);

}//end if condition
if ($image_three){
 unlink($old_three);  
$image_name = date('dmy_H_s_i');
$ext = strtolower($image_three->getClientOriginalExtension());
$image_full_name = $image_name.'.'.$ext;
$upload_Path = 'upload/products/';
$image_url = $upload_Path.$image_full_name;
$success = $image_three->move($upload_Path,$image_full_name);

$data['image_three'] = $image_url;
$productimg = DB::table('items')->where('id',$id)->update($data);
$notification = array(
'message' => 'image three updated successfully',
'alert-type' => 'info'
);
return redirect()->route('all-item')->with($notification);

}//end if condition
}// end method


}

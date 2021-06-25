<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
        public function AddProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add',compact('categories','brands'));


    }//end method


    public function StoreProduct(Request $request){

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;

      $product_id = Product::insertGetId([
        'brand_id' => $request->brand_id,
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'subsubcategory_id' => $request->subsubcategory_id,
        'product_name_en' => $request->product_name_en,
        'product_name_fr' => $request->product_name_fr,
        'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
        'product_slug_fr' => str_replace(' ', '-', $request->product_name_fr),
        'product_code' => $request->product_code,

        'product_qty' => $request->product_qty,
        'product_tags_en' => $request->product_tags_en,
        'product_tags_fr' => $request->product_tags_fr,
        'product_size_en' => $request->product_size_en,
        'product_size_fr' => $request->product_size_fr,
        'product_color_en' => $request->product_color_en,
        'product_color_fr' => $request->product_color_fr,

        'selling_price' => $request->selling_price,
        'discount_price' => $request->discount_price,
        'short_descp_en' => $request->short_descp_en,
        'short_descp_fr' => $request->short_descp_fr,
        'long_descp_en' => $request->long_descp_en,
        'long_descp_fr' => $request->long_descp_fr,

        'hot_deals' => $request->hot_deals,
        'featured' => $request->featured,
        'special_offer' => $request->special_offer,
        'special_deals' => $request->special_deals,

        'product_thambnail' => $save_url,
        'status' => 1,
        'created_at' => Carbon::now(), 


         ]);


      ////////// Multiple Image Upload Start ///////////

      $images = $request->file('multi_img');
      foreach ($images as $img) {
        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
        $uploadPath = 'upload/products/multi-image/'.$make_name;

      
        MultiImg::insert([

                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(), 

        ]);

      }

      ////////// Een Multiple Image Upload Start ///////////


       $notification = array(
                        'message' => 'Product Inserted Successfully',
                        'alert-type' => 'success'
                );

                return redirect()->route('manage-product')->with($notification);

        } // end method

        public function ManageProduct(){

                $products = Product::latest()->get();
                return view('backend.product.product_view',compact('products'));
        } // end method


    
}

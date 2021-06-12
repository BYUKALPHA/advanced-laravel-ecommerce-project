<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

   public function CategoryView(){
$category = Category::latest()->get();
return view('backend.category.category_view',compact('category'));
    }//end method

    public function CategoryStore(Request $request){
$request->validate([
    'category_name_en' => 'required',
     'category_name_fr' => 'required',
    'category_icon' => 'required',
],[
 'category_name_en.required' => 'Input Category English Name',
 'category_name_fr.required' => 'Input Category French Name',
 
]);

Category::insert([
'category_name_en' => $request->category_name_en,
'category_name_fr' => $request->category_name_fr,
'category_slug_en' => strtolower(str_replace('','-',$request->category_name_en )),
'category_slug_fr' => str_replace('','-',$request->category_name_fr),
'category_icon' => $request->category_icon,

]);
$notification = array(
'message' => 'Category added successfully',
'alert-type' => 'success'
);
return redirect()->back()->with($notification);

    }//end method
}

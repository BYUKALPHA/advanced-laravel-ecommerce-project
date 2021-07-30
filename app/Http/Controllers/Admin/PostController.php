<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post_category;
use Carbon\Carbon;
use DB;
use Image;

class PostController extends Controller
{
public function BlogCatList(){
    $blogcat = DB::table('post_categories')->get();
    return view('admin.blog.category.index',compact('blogcat'));
} // end method

public function BlogCatStore(Request $request){
$validateData = $request->validate([
'category_name_en'=>'required|max:255',
'category_name_fr'=>'required|max:255',
]);
$data = array();
$data['category_name_en'] = $request->category_name_en;
$data['category_name_fr'] = $request->category_name_fr;
DB::table('post_category')->insert($data);
$notification = array(
'message' => 'Blog Category added successfully',
'alert-type' => 'success'
);
return redirect()->back()->with($notification);

}//end method
public function BlogCatEdit($id){
        $category = Post_category::findOrFail($id);    
    return view('admin.blog.category.edit',compact('category'));
    }// end methode

public function BlogCatUpdate(Request $request){

$cat_id = $request->id;

Post_category::findOrFail($cat_id)->update([
'category_name_en' => $request->category_name_en,
'category_name_fr' => $request->category_name_fr,
]);
$notification = array(
'message' => 'Blog Category updated successfully',
'alert-type' => 'success'
);
return redirect()->route('manage-blog')->with($notification);

    }//end method


public function BlogCatDelete($id){
Post_category::findOrFail($id)->delete();
$notification = array(
'message' => 'Blog Category deleted successfully',
'alert-type' => 'success'
);
return redirect()->back()->with($notification);
}//end method

public function PostAdd(){  
 $categories = DB::table('post_categories')->get(); 
    return view('admin.blog.create_post',compact('categories'));
} // end method

public function PostStore(Request $request){
  $data = array();
  $data['category_id']= $request->category_id;
  $data['post_title_en']= $request->post_title_en;
  $data['post_title_fr']= $request->post_title_fr;
  $data['details_en']= $request->details_en;
  $data['details_fr']= $request->details_fr;
  $data['created_at'] = Carbon::now(); 

  $post_image = $request->file('post_image');

  if($post_image){
    $post_image_name = hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
    Image::make($post_image)->resize(400,200)->save('upload/post/'. $post_image_name);
    $data['post_image'] = 'upload/post/'.$post_image_name;

    DB::table('posts')->insert($data);
    $notification = array(
'message' => 'Post inserted successfully',
'alert-type' => 'success'
);
return redirect()->back()->with($notification);
  } else {
    $data['post_image']='';
    DB::table('posts')->insert($data);
    $notification = array(
'message' => 'Post inserted without image',
'alert-type' => 'success'
);
return redirect()->back()->with($notification);
  }  // end if       
        
        
}// end method 

}

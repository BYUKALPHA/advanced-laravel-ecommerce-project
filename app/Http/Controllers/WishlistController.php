<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class WishlistController extends Controller
{
public function AddWishlist($id){
    $userid = Auth::id();
    $check = DB::table('wishlists')->where('user_id',$userid)->where('item_id',$id)->first();
    $data = array(
      'user_id' => $userid,
      'item_id' => $id,
    );
    if (Auth::check()){
        if($check){
            return \Response::json(['error' => 'This product is already in your Wishlist']);        
        }else{
             DB::table('wishlists')->insert($data);
               return \Response::json(['success' => 'Product Successfully added to wishlist']);
        }

    }else{
        return \Response::json(['error' => 'Login to your account first']);
     }

}
}

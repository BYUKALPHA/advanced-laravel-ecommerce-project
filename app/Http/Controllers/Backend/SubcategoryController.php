<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
public function SubcategoryView(){
$subcategory = Subcategory::latest()->get();
return view('backend.category.subcategory_view',compact('subcategory'));
    }//end method

}

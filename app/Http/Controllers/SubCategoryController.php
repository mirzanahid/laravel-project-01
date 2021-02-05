<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MOdels\Cetegory;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SubCategoryController extends Controller
{
    function index(){


        return view('subcategory.index',[
           'categories' =>Cetegory::latest()->get(),
           'subcategories' =>Subcategory::paginate(5)
        ]);

    }
    function insert(Request $request){
        $request->validate([
            'category_id'=> 'required',
            'sub_category_name'=> 'required'
        ]);

        if(Subcategory::where('category_id',  $request->category_id)->where('sub_category_name',  $request->sub_category_name)->exists()){
            return back()->with('error_status', 'Sub Category has been already taken!');
        }
        else{

            Subcategory::insert([
                'category_id' => $request->category_id,
                'sub_category_name' => $request->sub_category_name,
                'added_by' => Auth::id(),
                'created_at' => Carbon::now(),

             ]);
            return back()->with('status', 'Sub Category Added Successfully!');
        }


     }

 function delete($subcategory_id){

     Subcategory::find($subcategory_id)->delete();
     return back();
 }

}

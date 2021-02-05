<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\Cetegory;

class CategoryController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $categories = Cetegory::latest()->get();
        return view('category.index' , compact('categories'));

    }

    function insert(Request $request){
        $request->validate([
            'category_name' => 'required|unique:cetegories,cetegory_name'
        ],[
            'category_name.required' => 'Category name is required',
            'category_name.unique' => 'Category name should be unique.'
        ]);

        Cetegory::insert([
            'cetegory_name' => $request->category_name,
            'added_by' => Auth::id(),
            'created_at' => Carbon::now()
        ]);
         return back()->with('status', 'Category added successfully!');


}
function delete($cetegory_id){
   Cetegory::find($cetegory_id)->delete();
   return back();
}
}

<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function category()
    
    {

       $categories = Category::all();

     return view('admin.layouts.category',compact('categories'));
    }


    public function categoryview()
    
    {

       $categories = Category::all();

     return view('admin.layouts.categoryview',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',

        ]);

        $category = new Category;

        $category->name=$request->name;
        
        $category->save();

        return redirect()->route('categoryview')->with('message','Category added');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function categoryedit($id)
    {
        

        {

            $categorys = Category::find($id);
           return response()->json([
            'status'=>200,
            'categorys'=>$categorys,
           ]);
        
            
        }

            
        }


    

    /**
     * Update the specified resource in storage.
     */
    public function categoryupdate(Request $request)
    {

        $cat_id = $request->input('cat_id');
        $tasks = Category::find($cat_id);
       
    
        $tasks->name=$request->name;
        // dd($tasks);
        $tasks->update();
        
        return back()->with('update','Updated Succesfully');

}
    /**
     * Remove the specified resource from storage.
     */
    public function categorydestroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return back()->with('category','deleted');
    }
 }

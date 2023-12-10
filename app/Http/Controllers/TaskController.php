<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function category()
    
    {

       
        $categories = Category::all();

     return view('admin.layouts.category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function taskadd(Request $request)
    {
        $request->validate([

            'title'=>'required',
            'description'=>'required',
            'date'=>'required',
            'category_id'=>'required',
        ]);

        $category = Category::findOrFail($request->category_id);

        $tasks = new Task;
        $tasks->title=$request->title;
        $tasks->description=$request->description;
        $tasks->date=$request->date;
        $tasks->category_id=$request->category_id;
       
        $category->tasks()->save($tasks);

        return redirect()->route('index')->with('task','Tasks Added');

    }

    /**
     * Display the specified resource.
     */
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $categories = Category::all();
      
        // return view('admin.update',compact('tasks','categories'));

        {

            $tasks = Task::find($id);
           return response()->json([
            'status'=>200,
            'tasks'=>$tasks,
           ]);
            
        }


    }

    public function view($id)
    {
        // $categories = Category::all();
      
        // return view('admin.update',compact('tasks','categories'));

        {

            $tasks = Task::find($id);
           return response()->json([
            'status'=>200,
            'tasks'=>$tasks,
           ]);
            
        }


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $task_id = $request->input('task_id');
        $tasks = Task::find($task_id);
       

        $tasks = Category::findOrFail($request->category_id)
                      ->tasks()->where('id',$task_id)->first();
      
        
       
  
        $tasks->title=$request->title;
        $tasks->description=$request->description;
        $tasks->category_id=$request->category_id;
        $tasks->date=$request->date;
   
     
        // dd($tasks);
       
        $tasks->update();
        
        return back()->with('sucesss','Updated Succesfully');


    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
      
        $task_id = $request->input('delete_stud_id');
        $tasks = Task::find($task_id);
        $tasks->delete();

      return back()->with('taskdelete', 'Succesfully Deleted');
    }




    public function mytask()
    {
        $tasks = Task::all();
        return view('admin.mytask',compact('tasks'));
    }
}

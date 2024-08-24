<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tasks=TaskList::get();
            return response()->json(['success'=>true,'message'=>'Data Fetched Successfully!','result'=>$tasks,'count'=>$tasks->count()],200);
        } catch (\Throwable $th) {
            return response()->json(['success'=>false,'message'=>'Internal Server Error!','error'=>$th->getMessage()],500);
        }
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $tasks=new TaskList();
            $tasks->name=$request->name;
            $tasks->priority=$request->priority;
            $tasks->status=$request->status;
            $tasks->save();
            return response()->json(['success'=>true,'message'=>'Task stored successfully!','result'=>$tasks],200);
        } catch (\Throwable $th) {
            return response()->json(['success'=>false,'message'=>'Internal Server Error!','error'=>$th->getMessage()],500);
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $task=TaskList::findOrFail($id);
            return response()->json(['success'=>true,'message'=>'Task fetched successfully!','result'=>$task],200); 
        } 
        catch (\Throwable $th) {
            return response()->json(['success'=>false,'message'=>'Internal Server Error!','error'=>$th->getMessage()],500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, taskList $taskList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(taskList $taskList)
    {
        //
    }
}

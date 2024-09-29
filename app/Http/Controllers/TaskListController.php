<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskListRequest;
use App\Http\Requests\UpdateTaskListRequest;

class TaskListController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tasks=TaskList::get();
            // return response()->json(['success'=>true,'message'=>'Data Fetched Successfully!','result'=>$tasks,'count'=>$tasks->count()],200);
            return successResponse($tasks,'Data Fetched Successfully!');
        } catch (\Throwable $th) {
            return response()->json(['success'=>false,'message'=>'Internal Server Error!','error'=>$th->getMessage()],500);
        }
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskListRequest $request)
    {
        try {
            $tasks=TaskList::create($request->validated());
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
    public function update(UpdateTaskListRequest $request, $id)
    {
        try {
            $task=TaskList::findOrFail($id);
            $task->update($request->validated());
            return response()->json(["success"=>true,"message"=>"Task updated successfully!","result"=>$task],200);
        } catch (\Throwable $th) {
            return response()->json(['success'=>false,'message'=>'Internal Server Error!','error'=>$th->getMessage()],500);
        }
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $task=TaskList::findOrFail($id);
            return response()->json(["success"=>true,"message"=>"Task removed successfully!","result"=>$task->delete()],200);
        } catch (\Throwable $th) {
            return response()->json(['success'=>false,'message'=>'Internal Server Error!','error'=>$th->getMessage()],500);

        }
    }
}

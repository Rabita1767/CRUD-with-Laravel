<?php
namespace app\Http\Controllers
class ApiController extends Controller{
    protected function successResponse($success=true,$message,$data,$status=200)
    {
     return response()->json(['success'=>$success,'message'=>$message,'result'=>$data],$status);
    }
}
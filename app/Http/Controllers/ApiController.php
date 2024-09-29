<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // Ensure you import the Controller class

class ApiController extends Controller {
    protected function successResponse($success = true, $message, $data, $status = 200) {
        return response()->json(['success' => $success, 'message' => $message, 'result' => $data], $status);
    }
}

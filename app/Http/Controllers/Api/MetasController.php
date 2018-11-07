<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Metas\GetAvailableMetasFromModel;
use Illuminate\Http\Request;

class MetasController extends Controller
{
    public function getAvailableMetasFromModel(Request $request)
    {
        return (new GetAvailableMetasFromModel($request->model))->run();
    }
}

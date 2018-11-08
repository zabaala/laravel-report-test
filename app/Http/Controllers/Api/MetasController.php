<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\DbMetaRepository;
use Illuminate\Http\Request;

class MetasController extends Controller
{
    /**
     * @param Request $request
     * @param DbMetaRepository $metaRepository
     * @return mixed
     */
    public function getMetasByModelName(Request $request, DbMetaRepository $metaRepository)
    {
        return $metaRepository->getMetasByModelName($request->model);
    }
}

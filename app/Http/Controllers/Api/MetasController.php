<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\DbMetaRepository;
use Illuminate\Http\Request;

class MetasController extends Controller
{
    /**
     * @param DbMetaRepository $metaRepository
     * @return mixed
     */
    public function all(DbMetaRepository $metaRepository)
    {
        return $metaRepository->getAllMetas();
    }
}

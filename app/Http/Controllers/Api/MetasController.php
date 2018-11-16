<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\DbMetaRepository;
use Illuminate\Http\Request;

class MetasController extends Controller
{
    /**
     * @var DbMetaRepository
     */
    private $metaRepository;

    /**
     * MetasController constructor.
     * @param DbMetaRepository $metaRepository
     */
    public function __construct(DbMetaRepository $metaRepository)
    {
        $this->metaRepository = $metaRepository;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->metaRepository->getAllMetas();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getMetasByModelName(Request $request)
    {
        return $this->metaRepository->getMetasByModelName($request->model);
    }
}

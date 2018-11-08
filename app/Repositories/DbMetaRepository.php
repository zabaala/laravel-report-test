<?php

namespace App\Repositories;

use App\Models\Meta;

class DbMetaRepository
{
    /**
     * @return mixed
     */
    public function getAllAvailableModels()
    {
        return Meta::select([
            \DB::raw('model as name'),
            'id',
        ])->groupBy('model')->get();
    }

    /**
     * @param $modelName
     * @return mixed
     */
    public function getMetasByModelName($modelName)
    {
        return Meta::whereModel($modelName)->get();
    }
}

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

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllMetas()
    {
        return Meta::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getMetaById($id)
    {
        return Meta::findOrFail($id);
    }
}

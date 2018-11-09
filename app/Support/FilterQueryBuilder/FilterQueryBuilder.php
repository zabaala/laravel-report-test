<?php

namespace App\Support\FilterQueryBuilder;

use App\Repositories\DbMetaRepository;
use App\Support\AvailableModels;
use App\Support\FilterQueryBuilder\Criteria\Criteria;

class FilterQueryBuilder
{
    /**
     * @var \Illuminate\Support\Collection
     */
    private $data;
    /**
     * @var object
     */
    private $model;

    /**
     * Builder constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->model = (new \ReflectionClass(AvailableModels::get($data['model'])))->newInstance();

        if (! array_key_exists('criteria', $data)) {
            return;
        }

        $this->data = collect($data['criteria']);

        $this->addCriteria();
    }

    /**
     * Add each criteria to query.
     */
    private function addCriteria()
    {
        $this->data->each(function ($criteria) {
            $type = key($criteria);
            $meta = (new DbMetaRepository())->getMetaById($criteria[$type]['meta_id']);
            $this->model = (new Criteria($type, $this->model, $criteria[$type], $meta->attribute))->getCriteria();
        });
    }

    public function getModel()
    {
        return $this->model;
    }
}

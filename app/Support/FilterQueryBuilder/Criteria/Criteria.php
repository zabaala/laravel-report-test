<?php

namespace App\Support\FilterQueryBuilder\Criteria;

use Illuminate\Database\Eloquent\Model;

class Criteria
{
    /**
     * A list with criteria definitions.
     *
     * @var array
     */
    protected $criteria = [];

    /**
     * Model instance.
     *
     * @var Model
     */
    protected $model;

    /**
     * The model attribute name received of the meta.
     *
     * @var string
     */
    protected $field;

    /**
     * Type of criteria.
     *
     * @var string
     */
    protected $type;

    /**
     * Criteria constructor.
     *
     * @param $type
     * @param $model
     * @param array $criteria
     * @param string $field
     */
    public function __construct($type, $model, array $criteria, $field)
    {
        $this->criteria = $criteria;
        $this->model = $model;
        $this->field = $field;
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getCriteria()
    {
        return $this->operatorGrammar();
    }

    /**
     * @return \Closure
     * @throws CriteriaException
     */
    protected function operatorGrammar()
    {
        switch (strtolower($this->criteria['operator'])) {
            case 'and':
                $query = $this->model->where($this->comparisionTypeGrammar());
                break;

            case 'or':
                $query =  $this->model->orWhere($this->comparisionTypeGrammar());
                break;

            default:
                throw new CriteriaException(
                    'Unrecognized ' . $this->criteria['operator'] . ' operator.'
                );
        }

        return $query;
    }

    /**
     * Build the comparision closure based on comparision_type value.
     *
     * @return \Closure
     * @throws CriteriaException
     */
    protected function comparisionTypeGrammar()
    {
        if ($this->type !== 'date') {
            switch ($this->criteria['comparision_type']) {
                case 'equals_to':
                    $query = function ($query) {
                        $query->where($this->field, '=', $this->criteria['value']);
                    };
                    break;

                case 'start_with':
                    $query = function ($query) {
                        $query->where($this->field, 'like', $this->criteria['value'] . '%');
                    };
                    break;

                case 'end_with':
                    $query = function ($query) {
                        $query->where($this->field, 'like', '%' . $this->criteria['value']);
                    };
                    break;

                case 'like':
                    $query = function ($query) {
                        $query->where($this->field, 'like', '%' . $this->criteria['value'] . '%');
                    };
                    break;

                default:
                    throw new CriteriaException(
                        'Unrecognized ' . $this->criteria['comparision_type'] . ' comparision type.'
                    );
            }
        } else {
            $query = function ($query) {
                $query->whereBetween($this->field, [$this->criteria['start_date'], $this->criteria['end_date']]);
            };
        }


        return $query;
    }
}

<?php

namespace App\Repositories;

use App\Models\Report;
use Illuminate\Pagination\LengthAwarePaginator;

class DbReportRepository
{
    /**
     * Get all available reports.
     *
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllAvailableReports($columns = ['*'])
    {
        return Report::all($columns);
    }

    /**
     * Get all reports paginanted.
     *
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function getAllReportsPaginated($columns = ['*'])
    {
        return Report::select($columns)->paginate();
    }

    /**
     * Find a report by id.
     *
     * @param $id
     * @return Report
     */
    public function findReportById($id)
    {
        return Report::find($id);
    }
}

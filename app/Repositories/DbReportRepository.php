<?php

namespace App\Repositories;

use App\Models\Report;

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
}

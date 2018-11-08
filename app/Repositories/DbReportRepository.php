<?php

namespace App\Repositories;

use App\Models\Report;
use App\Models\ReportMeta;
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

    /**
     * @param array $data
     * @return mixed
     */
    public function createReportFromArray(array $data)
    {
        $report = new Report();
        return $this->saveReport($data, $report);
    }

    /**
     * @param array $data
     * @param $id
     * @return Report
     */
    public function updateReportFromArray(array $data, $id)
    {
        /** @var $report Report */
        $report = Report::findOrFail($id);
        return $this->saveReport($data, $report);
    }

    /**
     * @param array $data
     * @param Report $report
     * @return mixed
     */
    private function saveReport(array $data, Report $report)
    {
        $report->name = $data['name'];
        $report->save();

        $report->metas()->delete();

        $report->metas()->saveMany(array_map(function ($item) {
            return new ReportMeta(['meta_id' => $item]);
        }, $data['meta_id']));

        return $report;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteReportById($id)
    {
        return Report::findOrFail($id)->delete();
    }
}

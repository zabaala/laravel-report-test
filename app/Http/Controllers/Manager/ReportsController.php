<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Repositories\DbMetaRepository;
use App\Repositories\DbReportRepository;

class ReportsController extends Controller
{
    /**
     * @var DbReportRepository
     */
    private $reportRepository;

    /**
     * ReportsController constructor.
     * @param DbReportRepository $reportRepository
     */
    public function __construct(DbReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    /**
     * See all manageable reports.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $reports = $this->reportRepository->getAllReportsPaginated();
        return view('manager.reports.index', compact('reports'));
    }

    /**
     * @param $id
     * @param DbMetaRepository $metaRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, DbMetaRepository $metaRepository)
    {
        $report = $this->reportRepository->findReportById($id);
        $availableModels = $metaRepository->getAllAvailableModels();

        return view('manager.reports.form', compact('report', 'availableModels'));
    }
}

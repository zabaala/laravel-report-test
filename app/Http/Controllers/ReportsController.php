<?php

namespace App\Http\Controllers;

use App\Http\FormRequests\Manager\Reports\ValidateReportFormRequest;
use App\Models\Report;
use App\Repositories\DbMetaRepository;
use App\Repositories\DbReportRepository;
use App\Support\AvailableModels;
use App\Support\FilterQueryBuilder\FilterQueryBuilder;

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
        return view('reports.index', compact('reports'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $report = $this->reportRepository->findReportById($id);

        if (empty($report->model)) {
            return redirect(route('reports.edit', $id))
                ->withCustomError(
                    'To use this report, please configure it correctly: model is not defined to report ' . $id
                );
        }

        $data = [
            'model' => $report->model,
            'criteria' => unserialize($report->criteria)
        ];

        $results = ((new FilterQueryBuilder($data))->getModel())->get();

        $presentationView = AvailableModels::getPresentation($report->model);

        return view(
            'reports.show',
            compact('results', 'report', 'results', 'presentationView')
        );
    }

    /**
     * @param DbMetaRepository $metaRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(DbMetaRepository $metaRepository)
    {
        return $this->formView(null, $metaRepository);
    }

    /**
     * @param ValidateReportFormRequest $request
     */
    public function store(ValidateReportFormRequest $request)
    {

        $report = $this->reportRepository->createReportFromArray($request->all());

        return redirect(route('reports.edit', $report->id))
            ->withSuccess('Report created with success.');
    }

    /**
     * @param $id
     * @param DbMetaRepository $metaRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, DbMetaRepository $metaRepository)
    {
        return $this->formView($id, $metaRepository);
    }

    /**
     * @param ValidateReportFormRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(
        ValidateReportFormRequest $request,
        $id
    )
    {
        $this->reportRepository->updateReportFromArray($request->all(), $id);

        return redirect(route('reports.edit', $id))
            ->withSuccess('Report updated with success.');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $this->reportRepository->deleteReportById($id);

        return redirect(route('reports.index'))
            ->withSuccess('Report was deleted with success.');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function formView($id)
    {
        /** @var $report Report */
        $report = is_numeric($id) ? $this->reportRepository->findReportById($id) : null;

        $models = AvailableModels::all();

        return view(
            'reports.form',
            compact('report', 'models')
        );
    }
}

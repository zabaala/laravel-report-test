<?php

namespace App\Services\Reports;

use App\Models\Report;
use App\Services\ServiceInterface;

class GetAllReports implements ServiceInterface
{

    /**
     * The service handler.
     *
     * @return mixed
     */
    public function run()
    {
        return Report::all();
    }
}

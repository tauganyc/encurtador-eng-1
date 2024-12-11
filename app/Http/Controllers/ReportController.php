<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Models\Report;

class ReportController extends Controller
{
    private $report;

    public function __construct(Report $report)
    {
        $this->report = new Report();
    }

    public function index(ReportRequest $request, $id)
    {
        $user = auth()->user();
        $reports = $this->report->getReport($id, $request->validated('date_start'), $request->validated('date_end'));

        return view('report.index', ['reports' => $reports]);
    }
}

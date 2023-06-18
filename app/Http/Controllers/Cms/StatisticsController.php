<?php

namespace App\Http\Controllers\Cms;

use App\Enums\StatusTransaction;
use App\Exports\ExportFile;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.statistics.index');
    }

    public function getStatistics(Request $request)
    {
        if ($request->ajax()) {
            $statistical_date_start = date("Y-m-d H:i:s", strtotime($request->statistical_date_start));
            $statistical_date_end = date("Y-m-d H:i:s", strtotime($request->statistical_date_end));
            $startOfTime = Carbon::parse($request->statistical_date_start)->startOfDay();
            $time_end = Carbon::parse($request->statistical_date_end)->endOfDay();
            $transactions = Transaction::whereBetween('updated_at', [$startOfTime, $time_end])->where('status', StatusTransaction::COMPLETED)->orderBy('updated_at', 'desc')->get();
            $count = $transactions->count();
            $html = view('cms.statistics.listStatistics', ['transactions' => $transactions, 'statistical_date_start' => $startOfTime, 'statistical_date_end' => $statistical_date_end, 'count' => $count])->render();
            return response()->json($html);
        }
        dd("Lỗi");
    }

    public function exportPdf(Request $request)
    {
        $day = Carbon::now()->day;
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $transactions = Transaction::whereBetween('updated_at', [$request->statistical_date_start_pdf, $request->statistical_date_end_pdf])
                                    ->where('status', StatusTransaction::COMPLETED)
                                    ->get();
        $data = [
            'transactions' => $transactions,
            'statistical_date_start' => $request->statistical_date_start_pdf,
            'statistical_date_end' => $request->statistical_date_end_pdf,
            'day' => $day,
            'month' => $month,
            'year' => $year
        ];
        $pdf = \PDF::loadView('cms.statistics.testpdf-pdf', $data);
        return $pdf->download('statistical' . $request->statistical_date_start_pdf . 'to' . $request->statistical_date_end_pdf . '.pdf');
    }

    public function exportExcel(Request $request)
    {
        return Excel::download(new ExportFile(), date('Y-m-d', strtotime($request->statistical_date_start_pdf)) . '_' .  date('Y-m-d', strtotime($request->statistical_date_end_pdf)) . '_' . 'by' . '_' . $request->user . '_' . 'statistic.xlsx');
    }
}

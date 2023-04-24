<?php

namespace App\Exports;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ExportFile implements FromView, ShouldAutoSize
{
    public function __construct()
    {
        $this->request = request();
    }

    public function view(): View
    {
        $day = Carbon::now()->day;
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $startDate = Carbon::parse($this->request['statistical_date_start_pdf'])->startOfDay();
        $endDate = Carbon::parse($this->request['statistical_date_end_pdf'])->endOfDay();
        $transactions = Transaction::whereBetween('transaction.updated_at', [$startDate, $endDate])->get();

        return view('cms.statistics.export-excel', [
            'data' => [
                'day' => $day,
                'month' => $month,
                'year' => $year,
                'transactions' => $transactions,
                'statistical_date_start' => $this->request['statistical_date_start_pdf'],
                'statistical_date_end' => $this->request['statistical_date_end_pdf'],
            ]
        ]);
    }
}

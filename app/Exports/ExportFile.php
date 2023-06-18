<?php

namespace App\Exports;

use App\Enums\StatusTransaction;
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
        $transactions = Transaction::whereBetween('transaction.updated_at', [$startDate, $endDate])
                                    ->where('status', StatusTransaction::COMPLETED)
                                    ->orderBy('updated_at', 'desc')
                                    ->get();
        foreach ($transactions as $transaction) {
            $transaction['convert_time'] = Carbon::parse($transaction->created_at)->tz('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        }
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

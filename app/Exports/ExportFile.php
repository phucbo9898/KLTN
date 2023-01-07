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

class ExportFile implements FromView
{
//    public function headings(): array
//    {
//        $date = $this->date;
//        $dateStart = $date['dateStart'];
//        $dateEnd = $date['dateEnd'];
////        dd($dateStart, $dateEnd);
//
//        return [
//            ['Báo cáo thống kê ngày: ' . '$dateStart' . ' đến ngày' . $dateEnd],
//            [
//                'STT',
//                'Tên sản phẩm',
//                'Số lượng',
//                'Đơn giá',
//                'Giảm giá',
//                'Thành tiền',
//                'Người mua',
//                'Mã giao dịch',
//            ]
//        ];
//    }
//
    public function __construct() {
        $this->request = request();
//        dd($this->request['statistical_date_start_pdf']);
//        $this->date = $dataArray['date'];
//        $this->transactions = $transactions;
//        dd($this->transactions, $this->date);
    }
//
//    /**
//    * @return \Illuminate\Support\Collection
//    */
//    public function collection()
//    {
//        $datas = $this->transactions;
////        dd($datas);
//        $stt = 1;
//        foreach ($datas as $dataExport) {
////            dd($dataExport);
//            $data[] = array(
//                '0' => $stt++,
//                '1' => $dataExport->product_name,
//                '2' => $dataExport->quantity,
//                '3' => number_format($dataExport->price, 0, ',', '.') . "VND",
//                '4' => ($dataExport->sale ?? 0) . "%",
//                '5' => number_format($dataExport->quantity * (($dataExport->price * (100 - $dataExport->sale)) / 100), 0, '.', '.') . "VND",
//                '6' => $dataExport->user_name,
//                '7' => $dataExport->id
//            );
////            dd($data);
//        }
////        $data = $this->data->map(function ($value, $key) use ($data) {
////            $data['stt'] = $key + 1;
////            $data['fan_name'] = $value->user->name ?? '';
////            $data['type'] = $value->transactionType->name ?? '';
////            $data['transaction_amount'] = $value->transaction_amount ?? 0;
////            return $data;
////        })->all();
//
////        dd($this->transactions);
//        return (collect($data));
//    }

    public function view(): View
    {
        $day = Carbon::now()->day;
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $transactions = Transaction::whereBetween('transaction.updated_at',[$this->request['statistical_date_start_pdf'], $this->request['statistical_date_end_pdf']])->get();
//                                    ->join('orders', 'orders.transaction_id', 'transaction.id')
//                                    ->join('products', 'orders.product_id', 'products.id')
//                                    ->join('users', 'users.id', 'transaction.user_id')
//                                    ->where('transaction.user_id', 'users.id')
//                                    ->select('transaction.id', 'products.name as product_name', 'orders.quantity', 'orders.price', 'orders.sale', 'users.name as user_name')
////                                    ->toSql();
//        dd($transactions);

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

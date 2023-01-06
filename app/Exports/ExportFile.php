<?php

namespace App\Exports;

use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportFile implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function headings(): array
    {
        return [
            'STT',
            'Tên sản phẩm',
            'Số lượng',
            'Đơn giá',
            'Giảm giá',
            'Thành tiền',
            'Người mua',
            'Mã giao dịch',
        ];
    }

    public function __construct($transactions) {
        $this->transactions = $transactions;
//        dd($transactions);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $datas = $this->transactions;
//        dd($datas);
        $stt = 1;
        foreach ($datas as $dataExport) {
//            dd($dataExport);
            $data[] = array(
                '0' => $stt++,
                '1' => $dataExport->product_name,
                '2' => $dataExport->quantity,
                '3' => number_format($dataExport->price, 0, ',', '.') . "VND",
                '4' => ($dataExport->sale ?? 0) . "%",
                '5' => number_format($dataExport->quantity * (($dataExport->price * (100 - $dataExport->sale)) / 100), 0, '.', '.') . "VND",
                '6' => $dataExport->user_name,
                '7' => $dataExport->id
            );
//            dd($data);
        }
//        $data = $this->data->map(function ($value, $key) use ($data) {
//            $data['stt'] = $key + 1;
//            $data['fan_name'] = $value->user->name ?? '';
//            $data['type'] = $value->transactionType->name ?? '';
//            $data['transaction_amount'] = $value->transaction_amount ?? 0;
//            return $data;
//        })->all();

//        dd($this->transactions);
        return (collect($data));
    }
}

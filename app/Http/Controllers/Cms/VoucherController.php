<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Voucher\StoreRequest;
use App\Models\Voucher;
use App\Repositories\VoucherRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VoucherController extends Controller
{
    private $voucherRepository;

    public function __construct(VoucherRepository $voucherRepository)
    {
        $this->voucherRepository = $voucherRepository;
    }

    public function index()
    {
        $vouchers = $this->voucherRepository->get();

        return view('cms.voucher.index', compact('vouchers'));
    }

    public function create()
    {
        return view('cms.voucher.create');
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            if ($request->expire_date) {
                $expire_date = Carbon::parse($request->expire_date)->format('Y-m-d H:i');
                $date_now = Carbon::now()->timezone('Asia/Ho_Chi_Minh')->format('Y-m-d H:i');
                if ($expire_date < $date_now) {
                    return back()->withInput()->with('error', 'Thời gian đã chọn phải lớn hơn hoặc bằng thời gian hiện tại');
                }
            }
            $voucher = $this->voucherRepository->prepareVoucher($data);
            $this->voucherRepository->create($voucher);
            DB::commit();
            return redirect()->route('admin.voucher.index')->with('success', 'Đã thêm 1 mã giảm giá !');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e->getMessage());
            return redirect()->back()->with('error', 'Thêm mã giảm giá không thành công');
        }
    }

    public function edit($id)
    {
        $voucher = $this->voucherRepository->find($id);
        if (!$voucher) {
            return redirect()->route('admin.voucher.index')->with('error', __('The requested resource is not available'));
        }

        return view('cms.voucher.edit', compact('voucher'));
    }

    public function update(Request $request, $id)
    {
        $voucher = $this->voucherRepository->find($id);
        if (!$voucher) {
            return redirect()->route('admin.voucher.index')->with('error', __('The requested resource is not available'));
        }
        try {
            DB::beginTransaction();
            $data = $request->all();
            $expire_date = Carbon::parse($request->expire_date)->format('Y-m-d H:i');
            $date_now = Carbon::now()->timezone('Asia/Ho_Chi_Minh')->format('Y-m-d H:i');
            if (Carbon::parse($voucher->expire_date)->format('Y-m-d H:i') != Carbon::parse($request->expire_date)->format('Y-m-d H:i')) {
                if ($expire_date < $date_now) {
                    return back()->withInput()->with('error', 'Thời gian đã chọn phải lớn hơn hoặc bằng thời gian hiện tại');
                }
            }
            $voucher = $this->voucherRepository->prepareVoucher($data);
            $this->voucherRepository->update($id, $voucher);
            DB::commit();
            return redirect()->route('admin.voucher.index')->with('success', 'Đã cập nhật mã giảm giá có id là ' . $id . ' !');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e->getMessage());
            return redirect()->back()->with('error', 'Cập nhật mã giảm giá không thành công');
        }
    }
}

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
    public function __construct(VoucherRepository $voucherRepo)
    {
        $this->voucherRepo = $voucherRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = $this->voucherRepo->all();

        return view('cms.voucher.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $expire_date = Carbon::parse($request->expire_date)->format('Y-m-d H:i');
            $date_now = Carbon::now()->timezone('Asia/Ho_Chi_Minh')->format('Y-m-d H:i');
            if ($expire_date < $date_now) {
                return back()->withInput()->with('error', 'Thời gian đã chọn phải lớn hơn hoặc bằng thời gian hiện tại');
            }
            $voucher = $this->voucherRepo->prepareVoucher($data);
            $this->voucherRepo->create($voucher);
            DB::commit();
            return redirect()->route('admin.voucher.index')->with('success', 'Đã thêm 1 mã giảm giá !');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e->getMessage());
            return redirect()->back()->with('error', 'Thêm mã giảm giá không thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voucher = $this->voucherRepo->find($id);
        if (!$voucher) {
            return redirect()->route('admin.voucher.index')->with('error', __('The requested resource is not available'));
        }

        return view('cms.voucher.edit', compact('voucher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $voucher = $this->voucherRepo->find($id);
        if (!$voucher) {
            return redirect()->route('admin.voucher.index')->with('error', __('The requested resource is not available'));
        }
        try {
//            dd(Carbon::parse($voucher->expire_date)->format('Y-m-d H:i'), Carbon::parse($request->expire_date)->format('Y-m-d H:i'));
            DB::beginTransaction();
            $data = $request->all();
            $expire_date = Carbon::parse($request->expire_date)->format('Y-m-d H:i');
            $date_now = Carbon::now()->timezone('Asia/Ho_Chi_Minh')->format('Y-m-d H:i');
            if (Carbon::parse($voucher->expire_date)->format('Y-m-d H:i') != Carbon::parse($request->expire_date)->format('Y-m-d H:i')) {
                if ($expire_date < $date_now) {
                    return back()->withInput()->with('error', 'Thời gian đã chọn phải lớn hơn hoặc bằng thời gian hiện tại');
                }
            }
            $voucher = $this->voucherRepo->prepareVoucher($data);
            $this->voucherRepo->update($id, $voucher);
            DB::commit();
            return redirect()->route('admin.voucher.index')->with('success', 'Đã cập nhật mã giảm giá có id là ' . $id . ' !');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e->getMessage());
            return redirect()->back()->with('error', 'Cập nhật mã giảm giá không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

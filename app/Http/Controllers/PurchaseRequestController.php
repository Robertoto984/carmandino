<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CommandNumGen;
use App\Models\PurchaseRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\PurchaseRequest\StorePurchaseRequestService;
use App\Services\PurchaseRequest\UpdatePurchaseRequestService;
use App\Http\Requests\PurchaseRequest\StorePurchaseOrderRequest;
use App\Http\Requests\PurchaseRequest\UpdatePurchaseOrderRequest;

class PurchaseRequestController extends Controller
{
    use CommandNumGen;

    protected $storePurchaseRequestService;
    protected $updatePurchaseRequestService;

    public function __construct(
        StorePurchaseRequestService $storePurchaseRequestService,
        UpdatePurchaseRequestService $updatePurchaseRequestService
    ) {
        $this->storePurchaseRequestService = $storePurchaseRequestService;
        $this->updatePurchaseRequestService = $updatePurchaseRequestService;
    }

    public function index(Request $request)
    {
        $orders = PurchaseRequest::select('id', 'number', 'date', 'reference', 'responsible')->get();
        return view('purchase_requests.index', compact('orders'));
    }

    public function create()
    {
        $number = $this->generatePurchaseRequestNumber();

        return view('purchase_requests.create', \compact('number'));
    }

    public function store(StorePurchaseOrderRequest $request)
    {
        try {
            $data = $request->validated();
            $this->storePurchaseRequestService->store($data);
            return response()->json([
                'message' => 'تم إضافة الطلب بنجاح.',
                'redirect' => route('purchase_requests.index')
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'حدث خطأ أثناء إضافة الطلب:',
                'redirect' => route('purchase_requests.index')
            ]);
        }
    }

    public function edit($id)
    {
        $row = DB::table('purchase_requests')
            ->leftJoin('purchase_request_product', 'purchase_requests.id', '=', 'purchase_request_product.request_id')
            ->select('purchase_requests.*', 'purchase_request_product.*')
            ->where('purchase_requests.id', $id)
            ->first();

        return response()->json([
            'html' => view(
                'purchase_requests.edit',
                [
                    'row' => $row,
                ]
            )->render(),
        ]);
    }

    public function update(UpdatePurchaseOrderRequest $request, $id)
    {
        try {
            $this->updatePurchaseRequestService->update($request->all(), $id);
            return response()->json([
                'message' => 'تم تعديل الطلب بنجاح.',
                'redirect' => route('purchase_requests.index')
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'حدث خطأ أثناء تعديل الطلب',
                'redirect' => route('purchase_requests.index')
            ]);
        }
    }
}

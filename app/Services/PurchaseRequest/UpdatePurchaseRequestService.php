<?php

namespace App\Services\PurchaseRequest;

use Carbon\Carbon;
use App\Models\PurchaseRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdatePurchaseRequestService
{
    public function update(array $orders, $id)
    {
        DB::beginTransaction();
        try {
            $purchaseRequest = PurchaseRequest::findOrFail($id);

            if ($purchaseRequest) {
                $purchaseRequest->update([
                    'number' => $orders['number'],
                    'date' => $orders['date'],
                    'reference' => $orders['reference'],
                    'responsible' => $orders['responsible'],
                    'purchase_justifications' => $orders['purchase_justifications'],
                    'total' => isset($orders['total']) ? $orders['total'] : '',
                    'notes' => $orders['notes'],
                ]);
            }

            if (
                isset($orders['required_parts']) && is_array($orders['required_parts'])
            ) {
                DB::table('purchase_request_product')->where('request_id', $purchaseRequest->id)->delete();

                foreach ($orders['required_parts'] as $key => $prod) {
                    $total_price = $orders['quantity'][$key] * $orders['price'][$key];
                    DB::table('purchase_request_product')->updateOrInsert([
                        'request_id' => $purchaseRequest->id,
                        'required_parts' => $orders['required_parts'][$key]
                    ], [
                        'quantity' => $orders['quantity'][$key],
                        'price' => $orders['price'][$key],
                        'total_price' => $total_price,
                        'description' => $orders['description'][$key],
                        'product_responsible' => $orders['product_responsible'][$key],
                        'created_at' => Carbon::now(),
                    ]);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}

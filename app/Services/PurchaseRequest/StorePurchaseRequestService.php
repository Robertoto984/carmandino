<?php

namespace App\Services\PurchaseRequest;

use App\Models\PurchaseRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StorePurchaseRequestService
{
    public function store(array $orders)
    {
        DB::beginTransaction();
        try {
            foreach ($orders['number'] as $key => $value) {
                $row = PurchaseRequest::create([
                    'number' => $value,
                    'date' => $orders['date'][$key],
                    'reference' => $orders['reference'][$key],
                    'responsible' => $orders['responsible'][$key],
                    'purchase_justifications' => $orders['purchase_justifications'][$key],
                    'total' => $orders['total'][$key],
                    'notes' => $orders['notes'][$key],
                ]);
            }

            if (isset($orders['required_parts']) && is_array($orders['required_parts'])) {
                foreach ($orders['required_parts'] as $prod) {
                    DB::table('purchase_request_product')->insert([
                        'request_id' => $row->id,
                        'required_parts' => $orders['required_parts'][$key],
                        'quantity' => $orders['quantity'][$key],
                        'price' => $orders['price'][$key],
                        'total_price' => $orders['total_price'][$key],
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

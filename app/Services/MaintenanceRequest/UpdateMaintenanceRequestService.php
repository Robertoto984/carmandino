<?php

namespace App\Services\MaintenanceRequest;

namespace App\Services\MaintenanceRequest;

use Carbon\Carbon;
use App\Models\MaintenanceRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateMaintenanceRequestService
{
    public function update(array $orders, $id)
    {
        DB::beginTransaction();
        try {
            $row = MaintenanceRequest::with('product')->where('id', $id)->first();

            if ($row) {
                $row->update([
                    'number' => $orders['number'],
                    'date' => $orders['date'],
                    'type' => $orders['type'],
                    'truck_id' => $orders['truck_id'],
                    'driver_id' => $orders['driver_id'],
                    'odometer_number' => $orders['odometer_number'],
                    'created_by' => $orders['created_by'],
                    'total' => $orders['total'],
                    'notes' => $orders['notes'],
                ]);
            } else {
                throw new \Exception('MaintenanceRequest with id ' . $id . ' not found.');
            }

            if (
                isset($orders['product_id']) && is_array($orders['product_id'])
            ) {
                // DB::table('request_product')->where('request_id', $row->id)->delete();

                foreach ($orders['product_id'] as $key => $prod) {
                    $total_price = $orders['quantity'][$key] * $orders['unit_price'][$key];
                    DB::table('request_product')
                        ->where('request_id', $row->id)
                        ->update([
                            'request_id' => $row->id,
                            'product_id' => $prod
                        ], [
                            'procedure_id' => $orders['procedure_id'][$key],
                            'quantity' => $orders['quantity'][$key],
                            'unit_price' => $orders['unit_price'][$key],
                            'total_price' => $total_price,
                            'created_at' => Carbon::now(),
                        ]);
                }
            }

            $row->total = $row->calculateTotal();
            $row->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage());
            throw $e;
        }
    }
}

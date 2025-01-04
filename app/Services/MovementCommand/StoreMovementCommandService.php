<?php

namespace App\Services\MovementCommand;

use App\Models\MovementCommand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoreMovementCommandService
{
    // public function store(array $data)
    // {
    //     DB::beginTransaction();

    //     try {
    //         foreach ($data['number'] as $index => $value) {
    //             // Create the MovementCommand record
    //             $row = MovementCommand::create([
    //                 'organized_by' => auth()->user()->name,
    //                 'number' => $data['number'][$index],
    //                 'date' => $data['date'][$index],
    //                 'responsible' => $data['responsible'][$index],
    //                 'truck_id' => $data['truck_id'][$index],
    //                 'driver_id' => $data['driver_id'][$index],
    //                 'destination' => $data['destination'][$index],
    //                 'task_start_time' => $data['task_start_time'][$index],
    //                 'task_end_time' => $data['task_end_time'][$index],
    //                 'initial_odometer_number' => $data['initial_odometer_number'][$index],
    //                 'final_odometer_number' => $data['final_odometer_number'][$index],
    //                 'distance' => $data['distance'][$index],
    //                 'task' => $data['task'][$index],
    //                 'notes' => $data['notes'][$index],
    //             ]);

    //             // if (isset($data['escort_id'][$index]) && !empty($data['escort_id'][$index])) {
    //             //     $escortIds = (array) $data['escort_id'][$index]; // Ensure it's an array
    //             //     $row->escort()->attach($escortIds); // Attach to pivot table
    //             // }

    //             if (isset($data['escort_id']) && is_array($data['escort_id'])) {
    //                 foreach ($data['escort_id'] as $k => $prod) {
    //                     DB::table('movement_escorts')->insert([
    //                         'mov_command_id' => $row->id,
    //                         'escort_id' => $prod,
    //                     ]);
    //                 }
    //             }
    //         }

    //         DB::commit();
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         throw $e;
    //     }
    // }

    public function store(array $data)
    {
        DB::beginTransaction();
        try {
            $row = '';
            foreach ($data['number'] as $index => $value) {

                $row = MovementCommand::create([
                    'organized_by' => auth()->user()->name,
                    'number' => $data['number'],
                    'date' => $data['date'][$index],
                    'responsible' => $data['responsible'][$index],
                    'truck_id' => $data['truck_id'][$index],
                    'driver_id' => $data['driver_id'][$index],
                    'destination' => $data['destination'][$index],
                    'task_start_time' => $data['task_start_time'][$index],
                    'task_end_time' => $data['task_end_time'][$index],
                    'initial_odometer_number' => $data['initial_odometer_number'][$index],
                    'final_odometer_number' => $data['final_odometer_number'][$index],
                    'distance' => $data['distance'][$index],
                    'task' => $data['task'][$index],
                    'notes' => $data['notes'][$index],
                ]);
                if (isset($data['escort_id'][$index])) {
                    $row->escort()->sync($data['escort_id'][$index]);
                }
            }


            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}

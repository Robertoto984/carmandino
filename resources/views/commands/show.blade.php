<form method="POST" id="show" action="{{ route('commands.update',$row->id) }}" class="submit-form edit">
    @csrf
    <div id="vehicle-forms-container">
        <div class="vehicle-form">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="number">الرقم</label>
                        <input type="text" name="number[]" value="{{ $row->number }}" id="number" class="form-control" readonly>
                        <span class="text-danger" id="number-error"></span>
                    </div>
                </div>
                <div class="form-group col-md-3 mb-3">
                    <label for="date">التاريخ</label>
                    <div class="input-group">
                        <input type="date" name="date[]" class="form-control" id="date[]" value="{{$row->date}}" readonly>
                        <div class="input-group-append">
                            <div class="input-group-text" id="button-addon-date">
                                <span class="fe fe-calendar fe-16"></span>
                            </div>
                        </div>
                        <span class="text-danger" id="date-error"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="responsible">الجهة المسؤولة</label>
                        <input type="text" name="responsible[]" value="{{ $row->responsible }}" id="responsible" class="form-control" readonly>
                        <span class="text-danger" id="responsible-error"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="truck_id">رقم السيارة</label>
                        <select name="truck_id[]" id="truck_id" class="form-control" disabled>
                            <option value="" disabled></option>
                            @foreach ($trucks as $truck)
                            <option value="{{ $truck->id }}" {{ $truck->id == $row->truck_id ? 'selected':'' }}>{{ $truck->plate_number }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="truck_id-error"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4 mb-3">
                    <label for="driver_id">السائق</label>
                    <select class="form-control" name="driver_id[]" id="driver_id" disabled>
                        <option value="" disabled></option>
                        @foreach($drivers as $driver)
                            <option value="{{ $driver->id }}" {{ $driver->id == $row->driver_id ? 'selected':'' }}>{{ $driver->first_name . ' '.  $driver->last_name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger" id="driver_id-error"></span>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="escort_id">المرافق</label>
                    <select class="filter-form form-control" id="escort_id" name="escort_id[]" multiple disabled>
                        <?php $ids=[]; foreach ($row->escort as $escort) { array_push($ids, $escort->id); } ?>
                        <option value="" disabled></option>
                        @foreach($escorts as $escort)
                            <option value="{{ $escort->id }}" {{ in_array($escort->id, $ids) ? 'selected':'' }}>{{ $escort->first_name . ' '.  $escort->last_name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger" id="escort_id-error"></span>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="destination">وجهة التنقل</label>
                        <input type="text" name="destination[]" value="{{ $row->destination }}" id="destination" class="form-control" readonly>
                        <span class="text-danger" id="destination-error"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="command_time">توقيت أمر المهمة</label>
                        <input type="time" name="command_time[]" id="command_time" value="{{ $row->command_time }}" readonly class="task_start_time form-control">
                        <span class="text-danger" id="command_time-error"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="task_start_time">توقيت البدء</label>
                        <input type="time" name="task_start_time[]" value="{{ $row->task_start_time }}" id="task_start_time" class="form-control" readonly>
                        <span class="text-danger" id="task_start_time-error"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="task_end_time">توقيت الانتهاء</label>
                        <input type="time" name="task_end_time[]" value="{{ $row->task_end_time }}" id="task_end_time" class="form-control" readonly>
                        <span class="text-danger" id="task_end_time-error"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="initial_odometer_number">العداد عند البدء</label>
                        <input type="number" name="initial_odometer_number[]" value="{{ $row->initial_odometer_number }}" id="initial_odometer_number" class="initial_odometer_number_0 form-control" readonly>
                        <span class="text-danger" id="initial_odometer_number-error"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="final_odometer_number">العداد عند الانتهاء</label>
                        <input type="number" name="final_odometer_number[]" value="{{ $row->final_odometer_number }}" id="final_odometer_number" class="final_odometer_number_0 form-control" readonly>
                        <span class="text-danger" id="final_odometer_number-error"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="distance">المسافة المقطوعة</label>
                        <input type="number" name="distance[]" value="{{ $row->distance }}" id="distance" class="distance_0 form-control" readonly>
                        <span class="text-danger" id="distance-error"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="task">المهمة</label>
                        <textarea class="form-control" readonly id="task" name="task[]" rows="4">{{ $row->task }}</textarea>
                        <span class="text-danger" id="task-error"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="notes">ملاحظات</label>
                        <textarea class="form-control" readonly id="notes" name="notes[]" rows="4">{{ $row->notes }}</textarea>
                        <span class="text-danger" id="notes-error"></span>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-btn" data-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-success rounded-btn">حفظ</button>
            </div>
        </div>
    </div>
</form>

<form method="POST" action="{{ route('maintenance_orders.update', ['id' => $row->id]) }}" class="submit-form">
    @csrf
    <div id="vehicle-forms-container">
        <div class="vehicle-form">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="number">الرقم</label>
                        <input type="text" name="number" id="number" class="form-control number"
                            value="{{ old('number', $row->number) }}" readonly>
                        <span class="text-danger" id="number-error"></span>
                    </div>
                </div>
                <div class="form-group col-md-3 mb-3">
                    <label for="date">التاريخ</label>
                    <div class="input-group">
                        <input type="date" name="date" class="date form-control" value="{{ old('date', $row->date) }}" readonly>
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
                        <label for="time">توقيت الطلب</label>
                        <input type="time" name="time" id="time" value="{{ old('time', $row->time) }}" readonly
                                class="task_start_time form-control">
                        <span class="text-danger" id="time-error"></span>
                    </div>
                </div>
                <div class="form-group col-md-3 mb-3">
                    <label for="type">نوع الصيانة</label>
                    <select class="form-control" id="type" name="type">
                        <option value="" disabled selected>اختر النوع</option>
                        @foreach($types as $type)
                        <option value="{{ $type }}" {{ $row->type == $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger" id="type-error"></span>
                </div>
                <div class="form-group col-md-3 mb-3">
                    <label for="start_date">تاريخ البدء</label>
                    <div class="input-group">
                        <input type="date" name="start_date" class="date form-control"
                            value="{{ old('start_date', $row->start_date) }}">
                        <div class="input-group-append">
                            <div class="input-group-text" id="button-addon-date">
                                <span class="fe fe-calendar fe-16">
                                </span>
                            </div>
                        </div>
                        <span class="text-danger" id="start_date-error"></span>
                    </div>
                </div>
                <div class="form-group col-md-3 mb-3">
                    <label for="end_date">تاريخ الانتهاء</label>
                    <div class="input-group">
                        <input type="date" name="end_date" class="date form-control"
                            value="{{ old('end_date', $row->end_date) }}">
                        <div class="input-group-append">
                            <div class="input-group-text" id="button-addon-date">
                                <span class="fe fe-calendar fe-16">
                                </span>
                            </div>
                        </div>
                        <span class="text-danger" id="end_date-error"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="start_time">توقيت البدء</label>
                        <input type="time" name="start_time" id="start_time" value="{{ old('start_time', $row->start_time) }}"
                                class="task_start_time form-control">
                        <span class="text-danger" id="start_time-error"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="end_time">توقيت الانتهاء</label>
                        <input type="time" name="end_time" id="end_time" value="{{ old('end_time', $row->end_time) }}"
                                class="task_start_time form-control">
                        <span class="text-danger" id="end_time-error"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3 mb-3">
                    <label for="driver_id">السائق</label>
                    <select class="form-control" id="driver_id" name="driver_id">
                        <option value="" disabled selected>اختر السائق</option>
                        @foreach($drivers as $driver)
                        <option value="{{ $driver->id }}" {{ $driver->id == $row->driver_id ? 'selected' : '' }}>
                            {{ $driver->first_name . ' ' . $driver->last_name }}
                        </option>
                        @endforeach
                    </select>
                    <span class="text-danger" id="driver_id-error"></span>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="truck_id">رقم السيارة</label>
                        <select name="truck_id" id="truck_id" class="form-control" >
                            <option value="" disabled selected>اختر السيارة</option>
                            @foreach($trucks as $truck)
                            <option value="{{ $truck->id }}" {{ $truck->id == $row->truck_id ? 'selected' : '' }}>
                                {{ $truck->plate_number }}
                            </option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="truck_id-error"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="odometer_number">رقم العداد</label>
                        <input type="number" name="odometer_number" id="odometer_number" class="form-control"
                            value="{{ old('odometer_number', $row->odometer_number) }}">
                        <span class="text-danger" id="odometer_number-error"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="created_by">القائم بالصيانة</label>
                        <input type="text" name="created_by" id="created_by" class="form-control"
                            value="{{ old('created_by', $row->created_by) }}">
                        <span class="text-danger" id="created_by-error"></span>
                    </div>
                </div>
            </div>

            <div id="card-order" style="background-color: rgba(0,0,0,.03); border: 1px solid rgba(0,0,0,.125);">
                @foreach($row->product as $index => $product)
                <div class="card-order" >
                    <div class="row" style="margin: 10px">
                        <div class="form-group col-md-1 mb-3">
                            <input class="form-control" name="procedure_number[]" value="{{ $index + 1 }}"
                                placeholder="الرقم" id="procedure_number" autocomplete="true">
                        </div>

                        <div class="form-group col-md-2 mb-3">
                            <select class="form-control" name="procedure_id[]">
                                <option value="" selected>الإجراء</option>
                                @foreach($procedures as $proc)
                                <option value="{{ $proc->id }}" {{ $proc->id == $product->pivot->procedure_id ?
                                    'selected' :
                                    '' }}>
                                    {{ $proc->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-2 mb-3">
                            <select class=" form-control" name="product_id[]">
                                <option value="" disabled selected>اختر المادة</option>
                                @foreach($products as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $product->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2 mb-3">
                            <input class="form-control" name="quantity[]" value="{{ $product->pivot->quantity ?? '' }}"
                                placeholder="الكمية">
                        </div>

                        <div class="form-group col-md-2 mb-3">
                            <input class="form-control" name="unit_price[]"
                                value="{{ $product->pivot->unit_price ?? '' }}" placeholder="السعر">
                        </div>

                        <div class="form-group col-md-2 mb-3">
                            <input class="form-control" name="total_price[]"
                                value="{{ $product->pivot->total_price ?? '' }}" placeholder="الإجمالي">
                        </div>
                        <div class="col-md-1">
                            <a href="" title="حذف" class="btn btn-danger btn-sm delete-driver justify-content-center d-flex align-items-center" id="remove">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </div>

                </div>
                @endforeach
               
            </div>
            <a style="margin: 10px" href="" title="اضافة" class="btn btn-primary btn-sm justify-content-center d-flex align-items-center" id="add">
                <i class="fa fa-plus"></i>
            </a>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="reference">المرجع</label>
                    <input type="text" name="reference" id="reference" class="form-control">
                    <span class="text-danger" id="reference-error"></span>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="total">الإجمالي</label>
                    <input class="form-control" id="total" name="total" value="{{ old('total', $row->total) }}">
                    <span class="text-danger" id="total-error"></span>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="notes">الملاحظات</label>
                    <textarea class="form-control" id="notes" name="notes"
                        rows="4" readonly>{{ old('notes', $row->notes) }}</textarea>
                    <span class="text-danger" id="notes-error"></span>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-btn" data-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-success rounded-btn">حفظ</button>
            </div>
        </div>
    </div>
</form>

<script src="{{ asset('js/form-repeater.js') }}"></script>



@extends('layouts.app')

@section('content')

<div class="col-12">
    <h2 class="page-title mb-3">طلب صيانة</h2>
    <div class="card shadow mb-4">
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="{{route('maintenance_orders.store')}}" class="submit-form">
                @csrf
                <div id="vehicle-forms-container">
                    <div class="vehicle-form">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="number">الرقم</label>
                                    <input type="text" name="number[]" id="number" class="form-control number" value="{{$number}}"
                                        readonly>
                                    <span class="text-danger" id="number-error"></span>
                                </div>
                            </div>
                            <div class="form-group col-md-3 mb-3">
                                <label for="date">التاريخ</label>
                                <div class="input-group">
                                    <input type="date" name="date[]" class="date form-control"
                                        value="{{ date('Y-m-d') }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text" id="button-addon-date">
                                            <span class="fe fe-calendar fe-16">
                                            </span>
                                        </div>
                                    </div>
                                    <span class="text-danger" id="date-error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="time">توقيت الطلب</label>
                                    <input type="time" name="time[]" id="time" value="{{ date("H:i") }}"
                                         class="task_start_time form-control">
                                    <span class="text-danger" id="time-error"></span>
                                </div>
                            </div>
                            <div class="form-group col-md-3 mb-3">
                                <label for="type">نوع الصيانة</label>
                                <select class=" form-control" id="type" name="type[]">
                                    <option value="" disabled selected>اختر النوع</option>
                                    @foreach($order_types as $ord_type)
                                    <option value="{{ $ord_type }}">{{ $ord_type}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="type-error"></span>
                            </div>
                            <div class="form-group col-md-3 mb-3">
                                <label for="start_date">تاريخ البدء</label>
                                <div class="input-group">
                                    <input type="date" name="start_date[]" class="date form-control"
                                        >
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
                                    <input type="date" name="end_date[]" class="date form-control"
                                        >
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
                                    <input type="time" name="start_time[]" id="start_time" 
                                         class="task_start_time form-control">
                                    <span class="text-danger" id="start_time-error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="end_time">توقيت الانتهاء</label>
                                    <input type="time" name="end_time[]" id="end_time" 
                                         class="task_start_time form-control">
                                    <span class="text-danger" id="end_time-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3 mb-3">
                                <label for="driver_id">السائق</label>
                                <select class=" form-control" id="driver_id" name="driver_id[]">
                                    <option value="" disabled selected>اختر السائق</option>
                                    @foreach($drivers as $driver)
                                    <option value="{{ $driver->id }}">{{ $driver->first_name . ' '. $driver->last_name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="driver_id-error"></span>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="truck_id">رقم السيارة</label>
                                    <select name="truck_id[]" id="truck_id"  class=" show-tick form-control">
                                        <option value="" disabled selected>اختر السيارة</option>
                                        @foreach ($trucks as $truck)
                                        <option value="{{ $truck->id }}"> {{ $truck->plate_number }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="truck_id-error"></span>
                                </div>
                            </div>
                        
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="odometer_number">رقم العداد</label>
                                    <input type="number" name="odometer_number[]" id="odometer_number"
                                        class="form-control odometer_number_0">
                                    <span class="text-danger" id="odometer_number-error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="created_by">القائم بالصيانة</label>
                                    <input type="text" name="created_by[]" id="created_by" class="form-control">
                                    <span class="text-danger" id="created_by-error"></span>
                                </div>
                            </div>
                        </div>
                        <div id="card-order"   style="background-color: rgba(0,0,0,.03);border:1px solid rgba(0,0,0,.125);">
                            <div class="card-order" >

                            <div class="row" style="margin: 10px">
                                <div class="form-group col-md-1 mb-3">
                                             <input type="text" name="procedure_number[]" id="procedure_number" class="form-control" value="1"
                                             readonly>
                                </div>
                                <div class="form-group col-md-2 mb-3">
                                    <select class="form-control" id="procedure_id" name="procedure_id[]">
                                        <option value=""  selected>الإجراء</option>
                                            @foreach($procedures as $proc)
                                                <option value="{{ $proc->id }}">{{ $proc->name }}</option>
                                            @endforeach
                                    </select>
                                    <span class="text-danger" id="procedure_id-error"></span>
                                </div>
                                <div class="form-group col-md-2 mb-3">
                                    <select class=" form-control" id="product_id" name="product_id[]">
                                        <option value="" disabled selected>اختر المادة</option>
                                        @foreach($products as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="product_id-error"></span>
                                </div>
                                <div class="form-group col-md-2 mb-3">
                                    <input type="number" class="form-control" id="quantity" name="quantity[]" placeholder="الكمية" autocomplete="true">

                                    <span class="text-danger" id="quantity-error"></span>
                                </div>
                                <div class="form-group col-md-2 mb-3">
                                    <input type="number" class="form-control" id="unit_price" name="unit_price[]" placeholder="السعر" autocomplete="true">
                                    <span class="text-danger" id="unit_price-error"></span>
                                </div>
                                <div class="form-group col-md-2 mb-3">
                                    <input type="number" class="form-control" id="total_price" name="total_price[]" placeholder="الإجمالي" autocomplete="true">
                                    <span class="text-danger" id="total_price-error"></span>
                                </div>
                                <a style="margin-bottom:15px" title="اضافة" class="btn btn-primary btn-sm justify-content-center d-flex align-items-center" id="add">
                                    <i class="fa fa-plus" style="color: #fff"></i>
                                </a>
                                <a style="margin-bottom:15px" href="" title="حذف" class="btn btn-danger btn-sm delete-driver justify-content-center d-flex align-items-center" id="remove">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="reference">المرجع</label>
                                <input type="text" name="reference[]" id="reference" class="form-control">
                                <span class="text-danger" id="reference-error"></span>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="total">الإجمالي</label>
                                <input class="form-control" id="total" name="total[]">
                                <span class="text-danger" id="total-error"></span>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="notes">الملاحظات</label>
                                <textarea class="form-control" id="notes" name="notes[]"
                                    rows="4"></textarea>
                                <span class="text-danger" id="notes-error"></span>
                            </div>
                        </div>
                        <div class="col mr-auto mb-5 mt-5">
                            <div class="ml-auto">
                            </div>
                            <div class="dropdown">
                                <button type="submit" class="btn btn-success rounded-btn">حفظ</button>
                                <button type="button" id="add-form-btn" class="btn rounded-btn btn-primary">
                                    طلب صيانة جديد
                                </button>
                                <button type="button" class="btn btn-danger rounded-btn delete-form-btn">
                                    إلغاء هذا الطلب
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/form-repeater.js') }}"></script>

<script>
    $(document).on('change', '#truck_id', function() {
        let truckId = $(this).val();
        let selectedTruck = @json($trucks).find(truck => truck.id == truckId);
        if (selectedTruck) {
            $(this).closest('.vehicle-form').find('#odometer_number').val(selectedTruck.kilometer_number);
        } else {
            $(this).closest('.vehicle-form').find('#odometer_number').val('');
        }
    });
</script>
@endsection
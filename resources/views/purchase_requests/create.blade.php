@extends('dashboard')
@section('content')

<div class="col-12">
    <h2 class="page-title mb-3">طلب شراء</h2>
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
            <form method="POST" action="{{route('purchase_requests.store')}}" class="submit-form">
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
                            <div class="col-md-3 form-group mb-3">
                                <label for="reference">المرجع</label>
                                <input type="text" name="reference[]" id="reference" class="form-control">
                                <span class="text-danger" id="reference-error"></span>
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="responsible">الجهة الطالبة</label>
                                <input type="text" name="responsible[]" id="responsible" class="form-control">
                                <span class="text-danger" id="responsible-error"></span>
                            </div>
                            <div class="card-order" style="background-color: rgba(0,0,0,.03);border:1px solid rgba(0,0,0,.125);">
                                <div class="row" style="margin: 10px">
                                    <div class="form-group col-md-1 mb-3">
                                        <input class="form-control" id="" name="[]" value="1" placeholder="الرقم" autocomplete="true">
                                        <span class="text-danger" id="-error"></span>
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <input type="text" name="required_parts[]" placeholder="القطعة المطلوبة" id="required_parts" class="form-control">
                                        <span class="text-danger" id="required_parts-error"></span>
                                    </div>
                                    <div class="form-group col-md-2 mb-3">
                                        <input class="form-control" id="quantity" name="quantity[]" placeholder="الكمية" autocomplete="true">

                                        <span class="text-danger" id="quantity-error"></span>
                                    </div>
                                    <div class="form-group col-md-2 mb-3">
                                        <input class="form-control" id="price" name="price[]" placeholder="السعر" autocomplete="true">
                                        <span class="text-danger" id="price-error"></span>
                                    </div>
                                    <div class="form-group col-md-2 mb-3">
                                        <input class="form-control" id="total_price" name="total_price[]" placeholder="الإجمالي" autocomplete="true">
                                        <span class="text-danger" id="total_price-error"></span>
                                    </div>
                                    <div class="form-group col-md-2 mb-3">
                                        <input class="form-control" id="description" name="description[]" placeholder="الوصف" autocomplete="true">
                                        <span class="text-danger" id="description-error"></span>
                                    </div>
                                    <div class="form-group col-md-2 mb-3">
                                        <input class="form-control" id="product_responsible" name="product_responsible[]" placeholder="الجهة الطالبة" autocomplete="true">
                                        <span class="text-danger" id="product_responsible-error"></span>
                                    </div>
                                </div>
                                <button type="button" id="add-new"></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="parts_description">الملاحظات</label>
                                <textarea class="form-control" id="notes" name="notes[]" rows="4"></textarea>
                                <span class="text-danger" id="notes-error"></span>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="purchase_justifications">مبررات الشراء</label>
                                <textarea class="form-control" id="purchase_justifications" name="purchase_justifications[]" rows="4"></textarea>
                                <span class="text-danger" id="purchase_justifications-error"></span>
                            </div>
                            <div class="form-group col-md-6 mb-3 ml-auto">
                                <label for="total">الإجمالي</label>
                                <input class="form-control" id="total" name="total[]" />
                                <span class="text-danger" id="total-error"></span>
                            </div>
                        </div>

                        <div class="col mr-auto mb-5 mt-5">
                            <div class="ml-auto">
                            </div>
                            <div class="dropdown">
                                <button type="submit" class="btn btn-success rounded-btn">حفظ</button>
                                <button type="button" id="add-form-btn" class="btn rounded-btn btn-primary">
                                    طلب شراء جديد
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
@endsection
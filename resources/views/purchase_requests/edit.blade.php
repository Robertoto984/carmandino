<form method="POST" action="{{route('purchase_requests.update',['id'=>$row->id])}}" class="submit-form">
    @csrf
    <div id="vehicle-forms-container">
        <div class="vehicle-form">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="number">الرقم</label>
                        <input type="text" name="number" id="number" class="form-control number" value="{{ old('number', $row->number) }}"
                            readonly>
                        <span class="text-danger" id="number-error"></span>
                    </div>
                </div>
                <div class="form-group col-md-3 mb-3">
                    <label for="date">التاريخ</label>
                    <div class="input-group">
                        <input type="date" name="date" class="date form-control"
                            value="{{ old('date', $row->date) }}">
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
                    <input type="text" name="reference" id="reference" class="form-control" value="{{ old('reference', $row->reference) }}">
                    <span class="text-danger" id="reference-error"></span>
                </div>
                <div class="col-md-3 form-group mb-3">
                    <label for="responsible">الجهة الطالبة</label>
                    <input type="text" name="responsible" id="responsible" class="form-control" value="{{ old('responsible', $row->responsible) }}">
                    <span class="text-danger" id="responsible-error"></span>
                </div>
                <div class="card-order" style="background-color: rgba(0,0,0,.03);border:1px solid rgba(0,0,0,.125);">
                    <div class="row" style="margin: 10px">
                        <div class="form-group col-md-1 mb-3">
                            <input class="form-control" id="" name="[]" value="1" placeholder="الرقم" autocomplete="true">
                            <span class="text-danger" id="-error"></span>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <input type="text" name="required_parts[]" placeholder="القطعة المطلوبة" value="{{ $row->required_parts ?? '' }}" id="required_parts" class="form-control">
                            <span class="text-danger" id="required_parts-error"></span>
                        </div>
                        <div class="form-group col-md-2 mb-3">
                            <input class="form-control" id="quantity" name="quantity[]" value="{{ $row->quantity ?? '' }}" placeholder="الكمية" autocomplete="true">

                            <span class="text-danger" id="quantity-error"></span>
                        </div>
                        <div class="form-group col-md-2 mb-3">
                            <input class="form-control" id="price" name="price[]" value="{{ $row->price ?? '' }}" placeholder="السعر" autocomplete="true">
                            <span class="text-danger" id="price-error"></span>
                        </div>
                        <div class="form-group col-md-2 mb-3">
                            <input class="form-control" id="total_price" name="total_price[]" value="{{ $row->total_price ?? '' }}" placeholder="الإجمالي" autocomplete="true">
                            <span class="text-danger" id="total_price-error"></span>
                        </div>
                        <div class="form-group col-md-2 mb-3">
                            <input class="form-control" id="description" name="description[]" value="{{ $row->description ?? '' }}" placeholder="الوصف" autocomplete="true">
                            <span class="text-danger" id="description-error"></span>
                        </div>
                        <div class="form-group col-md-2 mb-3">
                            <input class="form-control" id="product_responsible" name="product_responsible[]" value="{{ $row->product_responsible ?? '' }}" placeholder="الجهة الطالبة" autocomplete="true">
                            <span class="text-danger" id="product_responsible-error"></span>
                        </div>
                    </div>
                    <button type="button" id="add-new"></button>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="parts_description">الملاحظات</label>
                    <textarea class="form-control" id="notes" name="notes[]" rows="4">{{ $row->notes }}</textarea>
                    <span class="text-danger" id="notes-error"></span>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="purchase_justifications">مبررات الشراء</label>
                    <textarea class="form-control" id="purchase_justifications" name="purchase_justifications[]" rows="4">{{ $row->purchase_justifications }}</textarea>
                    <span class="text-danger" id="purchase_justifications-error"></span>
                </div>
                <div class="form-group col-md-6 mb-3 ml-auto">
                    <label for="total">الإجمالي</label>
                    <input class="form-control" type="number" id="total" name="total[]" value="{{ old('total', $row->total) }}"/>
                    <span class="text-danger" id="total-error"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-btn" data-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-success rounded-btn">حفظ</button>
            </div>
        </div>
    </div>
</form>
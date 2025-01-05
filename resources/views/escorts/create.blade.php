@extends('layouts.app')
@section('content')

<div class="col-12">
    <h2 class="page-title mb-3">بطاقة مرافق</h2>
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
            <form method="POST" action="{{ route('escorts.store') }}" class="submit-form">
    @csrf
    <div id="vehicle-forms-container">
        <div class="vehicle-form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="first_name">الاسم الأول</label>
                        <input type="text" name="first_name[]" id="first_name" class="form-control @error('first_name.*') is-invalid @enderror">
                        <span class="text-danger" id="first_name-error"></span>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="last_name">الكنية</label>
                        <input type="text" name="last_name[]" id="last_name" class="form-control @error('last_name.*') is-invalid @enderror">
                        <span class="text-danger" id="last_name-error"></span>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="birth_date">تاريخ الميلاد</label>
                        <div class="input-group">
                            <input type="text" name="birth_date[]" class="form-control drgpicker @error('birth_date.*') is-invalid @enderror" id="birth_date" aria-describedby="button-addon">
                            <div class="input-group-append">
                                <div class="input-group-text" id="button-addon-date">
                                    <span class="fe fe-calendar fe-16"></span>
                                </div>
                            </div>
                        </div>
                       
                        <span class="text-danger" id="birth_date-error"></span>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="phone">رقم الهاتف</label>
                        <input type="text" name="phone[]" id="phone" class="form-control @error('phone.*') is-invalid @enderror">
                        <span class="text-danger" id="phone-error"></span>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="address">العنوان</label>
                        <input type="text" name="address[]" id="address" class="form-control @error('address.*') is-invalid @enderror">
                        <span class="text-danger" id="address-error"></span>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="license_type">فئة الشهادة</label>
                        <select class="form-control @error('license_type.*') is-invalid @enderror" name="license_type[]" id="license_type">
                            <option value=""  selected>اختر فئة الشهادة</option>
                            @foreach($LicenseTypes as $type)
                                <option value="{{ $type }}" {{ old('license_type') == $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                     
                        <span class="text-danger" id="license_type-error"></span>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="license_expiration_date">تاريخ انتهاء الشهادة</label>
                        <div class="input-group">
                            <input type="date" name="license_expiration_date[]" class="form-control  " value="" id="license_expiration_date" aria-describedby="button-addon">
                            <div class="input-group-append">
                                <div class="input-group-text" id="button-addon-date">
                                    <span class="fe fe-calendar fe-16"></span>
                                </div>
                            </div>
                        </div>
                      
                        <span class="text-danger" id="license_expiration_date-error"></span>

                    </div>
                </div>
            </div>
            <div class="col mr-auto mb-5 mt-5">
                <div class="ml-auto">
                </div>
                <div class="dropdown">
                    <button type="submit" class="btn btn-success rounded-btn">حفظ</button>
                    <button type="button" id="add-form-btn" class="btn rounded-btn btn-primary">
                        بطاقة مرافق جديد
                    </button>
                    <button type="button" class="btn btn-danger rounded-btn delete-form-btn">
                        إلغاء هذه البطاقة
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
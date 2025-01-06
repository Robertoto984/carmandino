

<div class="row d-flex justify-content-center align-items-center" style="">
    @can('index',\App\Models\Truck::class)
    
    <div class="col-md-4 col-sm-4 col-lg-4 col-4" >
        <div class=" flip-container">
            <div class="flipper">
                <div class="front d-flex justify-content-center align-items-center flex-column"
                style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                <i class="fe fe-truck fe-16" style="font-size: 30px;"></i>

                    <h1 style="color: #fff">المركبات</h1>
                    <h1 style="color: #fff;border:5px solid #fff;padding:10px;border-radius:20px">{{ \App\Models\Truck::count() }}</h1>

                </div>
                <div class="back d-flex justify-content-center align-items-center flex-column"
                style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                    <a href="{{route('trucks.index')}}" style="color: #fff">
                        <h2 class="card-text">قائمة المركبات </h2>
                    </a>
                    <a href="{{route('trucks.create')}}" style="color:#fff">
                        <h2 class="card-text">بطاقة مركبة</h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endcan
    @can('index',\App\Models\MovementCommand::class)

    <div class="col-md-4 col-sm-4 col-lg-4 col-4"  >
        <div class=" flip-container">
            <div class="flipper">
                <div class="front d-flex justify-content-center align-items-center flex-column"
                    style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                    <i class="fe fe-truck fe-16" style="font-size: 30px;"></i>

                    <h1 style="color: #fff">أمر الحركة</h1>
                    <h1 style="color: #fff;border:5px solid #fff;padding:10px;border-radius:20px"> {{ \App\Models\MovementCommand::count() }}</h1>
                </div>
                <div class="back d-flex justify-content-center flex-column align-items-center"
                    style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                    <a href="{{route('commands.index')}}" style="color: #fff">
                        <h4 class="card-text">قائمة أوامر الحركة </h4>
                    </a>
                    {{-- <a href="{{route('trucks.create')}}" style="color:#fff">
                        <h4 class="card-text">بطاقة مركبة</h4>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
    @endcan
    @can('index',\App\Models\Driver::class)

    <div class="col-md-4 col-sm-4 col-lg-4 col-4">
        <div class=" flip-container">
            <div class="flipper">
                <div class="front d-flex justify-content-center align-items-center flex-column"
                    style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                    <i class="fe fe-users fe-16" style="font-size: 30px;"></i>

                    <h1 style="color: #fff">السائقين</h1>
                    <h1 style="color: #fff;border:5px solid #fff;padding:10px;border-radius:20px">{{ \App\Models\Driver::count() }}</h1>

                </div>
                <div class="back d-flex justify-content-center flex-column align-items-center"
                    style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                    <a href="{{route('drivers.index')}}" style="color: #fff">
                        <h4 class="card-text">قائمة السائقين </h4>
                    </a>
                    <a href="{{route('drivers.create')}}" style="color:#fff">
                        <h4 class="card-text">بطاقة سائق</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>

   @endcan
   
   

</div>

<div class="row d-flex justify-content-center align-items-center" style="">
    @can('index',\App\Models\Escort::class)

    <div class="col-md-4 col-sm-4 col-lg-4 col-4">
        <div class=" flip-container">
            <div class="flipper">
                <div class="front d-flex justify-content-center align-items-center flex-column"
                    style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                    <i class="fe fe-users fe-16" style="font-size: 30px;"></i>

                    <h1 style="color: #fff">المرافقين</h1>
                    <h1 style="color: #fff;border:5px solid #fff;padding:10px;border-radius:20px">{{ \App\Models\Escort::count() }}</h1>

                </div>
                <div class="back d-flex justify-content-center flex-column align-items-center"
                    style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                    <a href="{{route('escorts.index')}}" style="color: #fff">
                        <h4 class="card-text">قائمة المرافقين </h4>
                    </a>
                    <a href="{{route('escorts.create')}}" style="color:#fff">
                        <h4 class="card-text">بطاقة مرافق</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endcan
    @can('index',\App\Models\User::class)

    <div class="col-md-4 col-sm-4 col-lg-4 col-4">
        <div class=" flip-container">
            <div class="flipper">
                <div class="front d-flex justify-content-center align-items-center flex-column"
                    style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                    <i class="fe fe-users fe-16" style="font-size: 30px;"></i>

                    <h1 style="color: #fff">المستخدمين</h1>
                    <h1 style="color: #fff;border:5px solid #fff;padding:10px;border-radius:20px">{{ \App\Models\User::count() }}</h1>

                </div>
                <div class="back d-flex justify-content-center flex-column align-items-center"
                    style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                    <a href="{{route('users.index')}}" style="color: #fff">
                        <h4 class="card-text">قائمة المستخدمين </h4>
                    </a>
                    <a href="{{route('users.create')}}" style="color:#fff">
                        <h4 class="card-text">بطاقة مستخدم</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endcan
    @if(auth()->user()->can('index',\App\Models\MaintenanceRequest::class) || auth()->user()->can('index',\App\Models\MaintenanceTypes::class) || auth()->user()->can('index',\App\Models\Product::class) )

    <div class="col-md-4 col-sm-4 col-lg-4 col-4">
        <div class=" flip-container">
            <div class="flipper">
                <div class="front d-flex justify-content-center align-items-center flex-column"
                    style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                    <i class="fe fe-package fe-16" style="font-size: 30px;"></i>

                    <h1 style="color: #fff">الصيانة</h1>
                </div>
                <div class="back d-flex justify-content-center flex-column align-items-center"
                    style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                    <a href="{{route('maintenance_orders.index')}}" style="color: #fff">
                        <h4 class="card-text" >طلبات الصيانة :{{ \App\Models\MaintenanceRequest::count() }}</h4>
                        
                    </a>
                    <a href="{{route('maintenance.create')}}" style="color:#fff">
                        <h4 class="card-text">أنواع الصيانة :{{ \App\Models\MaintenanceTypes::count() }}</h4>
                    </a>
                    <a href="{{route('products.create')}}" style="color:#fff">
                        <h4 class="card-text">مواد الصيانة :{{ \App\Models\Product::count() }}</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif

</div>

<div class="row d-flex justify-content-center align-items-center" style="">
    @can('index',\App\Models\Supplier::class)
    <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        <div class=" flip-container">
            <div class="flipper">
                <div class="front d-flex justify-content-center align-items-center flex-column"
                    style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                    <i class="fa-solid fa-parachute-box" style="font-size: 30px;"></i>

                    <h1 style="color: #fff">المورّدين</h1>
                    <h1 style="color: #fff;border:5px solid #fff;padding:10px;border-radius:20px">{{ \App\Models\Supplier::count() }}</h1>

                </div>
                <div class="back d-flex justify-content-center flex-column align-items-center"
                    style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                    <a href="{{route('suppliers.index')}}" style="color: #fff">
                        <h4 class="card-text">قائمة المورّدين </h4>
                    </a>
                    {{-- <a href="{{route('trucks.create')}}" style="color:#fff">
                        <h4 class="card-text">بطاقة مركبة</h4>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
    @endcan
 
    <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        <div class=" flip-container">
            <div class="flipper">
                <div class="front d-flex justify-content-center align-items-center flex-column"
                    style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                    <i class="fe fe-package fe-16" style="font-size: 30px;"></i>

                    <h1 style="color: #fff">الطلبات</h1>
                </div>
                <div class="back d-flex justify-content-center flex-column align-items-center"
                    style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                    <a href="" style="color: #fff">
                        <h4 class="card-text">قائمة الطلبات :</h4>
                    </a>
                    <a href="" style="color: #fff">
                        <h4 class="card-text">طلب شراء :</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        <div class=" flip-container">
            <div class="flipper">
                <div class="front d-flex justify-content-center align-items-center flex-column"
                    style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                    <i class="fe fe-plus-square fe-16" style="font-size: 30px;"></i>

                    <h1 style="color: #fff">تعبئة وقود </h1>
                    <h1 style="color: #fff;border:5px solid #fff;padding:10px;border-radius:20px"> {{\App\Models\FuelRequest::count() }}</h1>

                </div>
                <div class="back d-flex justify-content-center flex-column align-items-center"
                    style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                    <a href="{{ route('fuel_requests.index') }}" style="color: #fff">
                        <h4 class="card-text">تعبئة وقود </h4>
                    </a>

                </div>
            </div>
        </div>
    </div>

    
  
</div>

<div class="col-sm-4 col-md-4 col-lg-4 col-4">
    <div class=" flip-container">
        <div class="flipper">
            <div class="front d-flex justify-content-center align-items-center flex-column"
                style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                <i class="fe fe-flag fe-16" style="font-size: 30px;"></i>

                <h1 style="color: #fff">التقارير</h1>
            </div>
            <div class="back d-flex justify-content-center flex-column align-items-center"
                style="background-color:#6ea8fe;color:#fff;border-radius:25px;border:1px solid #3d8bfd">
                <a href="" style="color: #fff">
                    <h4 class="card-text">تقرير إجمالي المركبات :</h4>
                </a>
                <a href="" style="color: #fff">
                    <h4 class="card-text">تقرير صيانة :</h4>
                </a>
                <a href="" style="color: #fff">
                    <h4 class="card-text">تقرير طلبات الشراء :</h4>
                </a>
                <a href="" style="color: #fff">
                    <h4 class="card-text">تقرير حركة مركبة :</h4>
                </a>
            </div>
        </div>
    </div>
</div>

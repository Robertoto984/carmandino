<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\EscortController;
use App\Http\Controllers\TrucksController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\FuelRequestController;
use App\Http\Controllers\MovementCommandController;
use App\Http\Controllers\PurchaseRequestController;
use App\Http\Controllers\MaintenanceTypesController;
use App\Http\Controllers\MaintenanceRequestController;



Route::get('/', function () {
    return view('login');
});

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => 'redirect'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::prefix('trucks')->controller(TrucksController::class)->group(function () {
        Route::get('index', 'index')->name('trucks.index');
        Route::get('create', 'create')->name('trucks.create');
        Route::post('store', 'store')->name('trucks.store');
        Route::get('edit/{id}', 'edit')->name('trucks.edit');
        Route::get('show/{id}', 'show')->name('trucks.show');
        Route::post('update/{id}', 'update')->name('trucks.update');
        Route::delete('bulk-delete', 'MultiDelete')->name('trucks.bulk-delete');
        Route::delete('delete/{id}', 'destroy')->name('trucks.delete');
        Route::get('import_form', 'ImportForm')->name('trucks.import_form');
        Route::get('export', 'export')->name('trucks.export');
        Route::post('import', 'import')->name('trucks.import');
    });

    Route::prefix('cards')->controller(CardsController::class)->group(function () {
        Route::get('index', 'index')->name('cards.index');
        Route::get('create/{id}', 'create')->name('trucks.create-deliver-order');
        Route::post('store', 'store')->name('trucks.store-deliver-order');
    });

    Route::prefix('maintenance')->controller(MaintenanceTypesController::class)->group(function () {
        Route::get('index', 'index')->name('maintenance.index');
        Route::get('create', 'create')->name('maintenance.create');
        Route::post('store', 'store')->name('maintenance.store');
        Route::get('edit/{id}', 'edit')->name('maintenance.edit');
        Route::post('update/{id}', 'update')->name('maintenance.update');
        Route::delete('bulk-delete', 'MultiDelete')->name('maintenance.bulk-delete');
        Route::delete('delete/{id}', 'destroy')->name('maintenance.delete');
        Route::get('import_form', 'ImportForm')->name('maintenance.import_form');
        Route::get('export', 'export')->name('maintenance.export');
        Route::post('import', 'import')->name('maintenance.import');
    });

    Route::prefix('products')->controller(ProductsController::class)->group(function () {
        Route::get('index', 'index')->name('products.index');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::post('update/{id}', 'update')->name('products.update');
        Route::delete('delete/{id}', 'destroy')->name('products.delete');
        Route::delete('bulk-delete', 'MultiDelete')->name('products.bulk-delete');
        Route::get('import_form', 'ImportForm')->name('products.import_form');
        Route::get('export', 'export')->name('products.export');
        Route::post('import', 'import')->name('products.import');
    });

    Route::prefix('maintenance-orders')->controller(MaintenanceRequestController::class)->group(function () {
        Route::get('index', 'index')->name('maintenance_orders.index');
        Route::get('create', 'create')->name('maintenance_orders.create');
        Route::post('store', 'store')->name('maintenance_orders.store');
        Route::get('edit/{id}', 'edit')->name('maintenance_orders.edit');
        Route::get('show/{id}', 'show')->name('maintenance_orders.show');

        Route::post('update/{id}', 'update')->name('maintenance_orders.update');
        Route::delete('bulk-delete', 'MultiDelete')->name('maintenance_orders.bulk-delete');
        Route::delete('delete/{id}', 'destroy')->name('maintenance_orders.delete');
        Route::get('import_form', 'ImportForm')->name('maintenance_orders.import_form');
        Route::get('export', 'export')->name('maintenance_orders.export');
        Route::post('import', 'import')->name('maintenance_orders.import');
    });

    Route::prefix('supplier')->controller(SupplierController::class)->group(function () {
        Route::get('index', 'index')->name('suppliers.index');
        Route::get('create', 'create')->name('suppliers.create');
        Route::post('store', 'store')->name('suppliers.store');
        Route::get('edit/{id}', 'edit')->name('suppliers.edit');
        Route::post('update/{id}', 'update')->name('suppliers.update');
        Route::delete('delete/{id}', 'destroy')->name('suppliers.delete');
        Route::delete('bulk-delete', 'MultiDelete')->name('suppliers.bulk-delete');
        Route::get('import_form', 'ImportForm')->name('suppliers.import_form');
        Route::get('export', 'export')->name('suppliers.export');
        Route::post('import', 'import')->name('suppliers.import');
    });


    Route::prefix('commands')->controller(MovementCommandController::class)->group(function () {
        Route::get('index', 'index')->name('commands.index');
        Route::get('create', 'create')->name('commands.create');
        Route::post('store', 'store')->name('commands.store');
        Route::get('edit/{id}', 'edit')->name('commands.edit');
        Route::post('update/{id}', 'update')->name('commands.update');
        Route::get('finish/{id}', 'finish')->name('commands.finish');
        Route::post('complete/{id}', 'complete')->name('commands.complete');
        Route::delete('bulk-delete', 'MultiDelete')->name('commands.bulk-delete');
        Route::delete('delete/{id}', 'destroy')->name('commands.delete');
        Route::get('import_form', 'ImportForm')->name('commands.import_form');
        Route::get('export', 'export')->name('commands.export');
        Route::post('import', 'import')->name('commands.import');
    });


    Route::prefix('drivers')->controller(DriversController::class)->group(function () {
        Route::get('index', 'index')->name('drivers.index');
        Route::get('create', 'create')->name('drivers.create');
        Route::post('store', 'store')->name('drivers.store');
        Route::get('edit/{id}', 'edit')->name('drivers.edit');
        Route::post('update/{id}', 'update')->name('drivers.update');
        Route::delete('bulk-delete', 'MultiDelete')->name('drivers.bulk-delete');
        Route::delete('delete/{id}', 'destroy')->name('drivers.delete');
        Route::get('import_form', 'ImportForm')->name('drivers.import_form');
        Route::get('export', 'export')->name('drivers.export');
        Route::post('import', 'import')->name('drivers.import');
    });
});

Route::prefix('escorts')->controller(EscortController::class)->group(function () {
    Route::get('index', 'index')->name('escorts.index');
    Route::get('create', 'create')->name('escorts.create');
    Route::post('store', 'store')->name('escorts.store');
    Route::get('edit/{id}', 'edit')->name('escorts.edit');
    Route::post('update/{id}', 'update')->name('escorts.update');
    Route::delete('delete/{id}', 'destroy')->name('escorts.delete');
    Route::delete('bulk-delete', 'MultiDelete')->name('escorts.bulk-delete');
    Route::get('import_form', 'ImportForm')->name('escorts.import_form');
    Route::get('export', 'export')->name('escorts.export');
    Route::post('import', 'import')->name('escorts.import');
});

Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get('index', 'index')->name('users.index');
    Route::get('create', 'create')->name('users.create');
    Route::post('store', 'store')->name('users.store');
    Route::get('edit/{id}', 'edit')->name('users.edit');
    Route::post('update/{id}', 'update')->name('users.update');
    Route::delete('bulk-delete', 'MultiDelete')->name('users.bulk-delete');
    Route::delete('delete/{id}', 'destroy')->name('users.delete');
    Route::get('import_form', 'ImportForm')->name('users.import_form');

    Route::get('export', 'export')->name('users.export');
    Route::post('import', 'import')->name('users.import');
});


Route::prefix('fuel-request')->controller(FuelRequestController::class)->group(function () {
    Route::get('index', 'index')->name('fuel_requests.index');
    Route::get('create', 'create')->name('fuel_requests.create');
    Route::post('store', 'store')->name('fuel_requests.store');
    Route::get('edit/{id}', 'edit')->name('fuel_requests.edit');
    Route::post('update/{id}', 'update')->name('fuel_requests.update');
    Route::delete('delete/{id}', 'destroy')->name('fuel_requests.delete');
    Route::delete('bulk-delete', 'MultiDelete')->name('fuel_requests.bulk-delete');
});

Route::prefix('purchase-request')->controller(PurchaseRequestController::class)->group(function () {
    Route::get('index', 'index')->name('purchase_requests.index');
    Route::get('create', 'create')->name('purchase_requests.create');
    Route::post('store', 'store')->name('purchase_requests.store');
    Route::get('edit/{id}', 'edit')->name('purchase_requests.edit');
    Route::post('update/{id}', 'update')->name('purchase_requests.update');
});

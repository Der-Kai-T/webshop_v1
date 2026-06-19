<?php


use App\Http\Controllers\AdminStatusController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;





Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('index');
    });

    Route::resource("/category", \App\Http\Controllers\CategoryController::class);
    Route::resource("/item", \App\Http\Controllers\ItemController::class);
    Route::get("/history", [\App\Http\Controllers\UserHistoryController::class, 'index'])->name('history');


    Route::post("/cart/add", [\App\Http\Controllers\CartController::class, 'add'])->name('card.add');
    Route::post("/cart/remove/{cart}", [\App\Http\Controllers\CartController::class, 'remove'])->name('card.remove');
    Route::get("/cart", [\App\Http\Controllers\CartController::class, 'index'])->name('card.index');
    Route::get("/checkout", [\App\Http\Controllers\CartController::class, 'checkout'])->name('card.checkout');
    Route::post("/checkout", [\App\Http\Controllers\CartController::class, 'checkoutPost'])->name('card.checkout.post');


    # Admin
    Route::livewire("/admin", \App\Livewire\App\Admin\Dashboard::class)->name("admin.index");
    Route::livewire("/admin/check_permissions", \App\Livewire\App\Admin\CheckPermissions::class)->name("admin.check-permissions");
    Route::livewire("/admin/dashboard", \App\Livewire\App\Admin\Dashboard::class)->name("admin.dashboard");


    ##Orders
    Route::livewire("/admin/orders", \App\Livewire\App\Admin\Orders::class)->name("admin.orders");
    Route::livewire("/admin/orders_grouped", \App\Livewire\App\Admin\OrdersGrouped::class)->name("admin.grouped-orders");
    Route::livewire("/admin/orders/{order}", \App\Livewire\App\Admin\OrderEditor::class)->name("admin.order.edit");

    Route::livewire("/admin/states", \App\Livewire\App\Admin\States::class)->name("admin.states");

    ## Categories
    Route::livewire("/admin/categories", \App\Livewire\App\Admin\Categories::class)->name("admin.categories");
    Route::livewire("/admin/items", \App\Livewire\App\Admin\Items::class)->name("admin.items");
    Route::livewire("/admin/item/{item}", \App\Livewire\App\Admin\ItemEditor::class)->name("admin.item.edit");


    ##Users
    Route::livewire("/admin/users", \App\Livewire\App\Admin\Users::class)->name("admin.users");
    Route::livewire("/admin/teams", \App\Livewire\App\Admin\Teams::class)->name("admin.teams");
    Route::livewire("/admin/roles", \App\Livewire\App\Admin\Roles::class)->name("admin.roles");


});



Route::get('/home', function() {
    return redirect("/");
})->name('home');


//require  __DIR__.'/auth.php';

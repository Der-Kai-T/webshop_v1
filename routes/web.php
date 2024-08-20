<?php



use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;





Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('index');
    });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource("/category", \App\Http\Controllers\CategoryController::class);
    Route::resource("/item", \App\Http\Controllers\ItemController::class);


    Route::post("/cart/add", [\App\Http\Controllers\CartController::class, 'add'])->name('card.add');
    Route::post("/cart/remove/{cart}", [\App\Http\Controllers\CartController::class, 'remove'])->name('card.remove');
    Route::get("/cart", [\App\Http\Controllers\CartController::class, 'index'])->name('card.index');
    Route::get("/checkout", [\App\Http\Controllers\CartController::class, 'checkout'])->name('card.checkout');

    Route::get("/admin", function () { return view('admin.index'); })->name('admin.index');
    Route::resource("/admin/category", \App\Http\Controllers\AdminCategoryController::class);
    Route::post("/admin/category/{category}/child_category", [\App\Http\Controllers\AdminCategoryController::class, 'addChildCategory'])->name('admin.category.addChildCategory');
    Route::resource("/admin/item", \App\Http\Controllers\AdminItemController::class);
    Route::post("/admin/item/{item}/category_add", [\App\Http\Controllers\AdminItemController::class, 'addCategory'])->name('admin.item.addCategory');
    Route::post("/admin/item/{item}/category_remove", [\App\Http\Controllers\AdminItemController::class, 'removeCategory'])->name('admin.item.removeCategory');
    Route::post("/admin/item/{item}/size_add", [\App\Http\Controllers\AdminItemController::class, 'addSize'])->name('admin.item.addSize');
    Route::post("/admin/item/{item}/upload", [\App\Http\Controllers\ItemImageController::class, 'upload'])->name('admin.item.upload');

    Route::resource("/admin/user", \App\Http\Controllers\AdminUserController::class);
    Route::post("/admin/user/{user}/role_add", [\App\Http\Controllers\AdminUserController::class, 'addRole'])->name('admin.user.addRole');
    Route::post("/admin/user/{user}/role_remove", [\App\Http\Controllers\AdminUserController::class, 'removeRole'])->name('admin.user.removeRole');


    Route::resource("/admin/team", \App\Http\Controllers\AdminTeamController::class);
    Route::post("/admin/team/{team}/user_add", [\App\Http\Controllers\AdminTeamController::class, 'addUser'])->name('admin.team.addUser');
    Route::post("/admin/team/{team}/user_remove", [\App\Http\Controllers\AdminTeamController::class, 'removeUser'])->name('admin.team.removeUser');

    Route::resource("/admin/role", \App\Http\Controllers\AdminRoleController::class);
    Route::post("/admin/role/{role}/permission_add", [\App\Http\Controllers\AdminRoleController::class, 'addPermission'])->name('admin.role.addPermission');
    Route::post("/admin/role/{role}/permission_remove", [\App\Http\Controllers\AdminRoleController::class, 'removePermission'])->name('admin.role.removePermission');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

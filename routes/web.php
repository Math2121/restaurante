<?php
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\MenusController;
use App\Http\Controllers\Admin\RestaurantPhotoController;
use App\Models\Restaurant;
use App\Models\RestaurantPhoto;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/restaurante/{id}', [App\Http\Controllers\HomeController::class, 'get'])->name('home.single');

Route::group(['middleware'=>['auth']],function(){
    Route::prefix('admin')->namespace('Admin')->group(function(){
        Route::prefix('restaurants')->group(function(){
            Route::get('/',[RestaurantController::class,'index'])->name('restaurant.index');

            //Rota para o formulário de cadastro nomeado
            Route::get('new',[RestaurantController::class,'new'])->name('restaurant.new');
            //Rota para inserir no banco de dados, nomeado
            Route::post('store',[RestaurantController::class,'store'])->name('restaurant.store');

              //Rota para inserir no banco de dados, nomeado
            Route::get('edit/{id}',[RestaurantController::class,'update'])->name('restaurant.edit');

                //Rota para inserir no banco de dados, nomeado
            Route::post('update/{id}',[RestaurantController::class,'edit'])->name('restaurant.update');


                    //Rota para inserir no banco de dados, nomeado
            Route::get('remove/{id}',[RestaurantController::class,'remove'])->name('restaurant.delete');
            Route::get('/photos/{id}',[RestaurantPhotoController::class,'index'])->name('restaurant.photo');
            Route::post('/photos/{id}',[RestaurantPhotoController::class,'save'])->name('restaurant.post');
        });

        Route::prefix('users')->group(function(){
            Route::get('/',[UsersController::class,'index'])->name('users.index');

            //Rota para o formulário de cadastro nomeado
            Route::get('new',[UsersController::class,'new'])->name('user.new');
            //Rota para inserir no banco de dados, nomeado
            Route::post('store',[UsersController::class,'store'])->name('user.store');


            Route::get('edit/{id}',[UsersController::class,'update'])->name('user.edit');


            Route::post('update/{id}',[UsersController::class,'edit'])->name('user.update');



            Route::get('remove/{id}',[UsersController::class,'remove'])->name('user.delete');
        });


         Route::prefix('menus')->group(function(){
            Route::get('/',[MenusController::class,'index'])->name('menu.index');

            //Rota para o formulário de cadastro nomeado
            Route::get('new',[MenusController::class,'new'])->name('menu.new');
            //Rota para inserir no banco de dados, nomeado
            Route::post('store',[MenusController::class,'store'])->name('menu.store');


            Route::get('edit/{id}',[MenusController::class,'update'])->name('menu.edit');


            Route::post('update/{id}',[MenusController::class,'edit'])->name('menu.update');



            Route::get('remove/{id}',[MenusController::class,'remove'])->name('menu.delete');
        });
    });
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('rel',function(){
    $restaurant = Restaurant::find(1);
   foreach ($restaurant->menus as $item) {
       # code...
       print 'Item cardápio'.$item->name.'R$'.$item->price;
   }
});

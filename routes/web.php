<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name?}', function ($name=null) {
    if ($name) {
        echo 'Hello ' . $name . '!';
    } else {
        echo 'Hello World!';
    }
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function (Request $request) {
    $username = $request->username;
    $password = $request->password;

    if ($username == 'admin' && $password == 'admin') {
        return view('welcome');
    }
    return view('login_error');
});

Route::get('/product', function(){
    return view('product');
});

Route::post('/product', function (Illuminate\Http\Request $request) {
    $description = $request->productDescription;
    $discountPercent = $request->discountPercent;
    $price = $request->price;
    $discountAmount = $price*$discountPercent*0.1;
    if($description){
        return view('kq', compact(['description', 'discountPercent', 'price', 'discountAmount']));
    }
});

Route::get('dictionary', function(){
    return view('dictionary');
});

Route::post('dictionary', function (Request $request) {
    $lists = ['hello' => 'xin chào', 'good bye' => 'tạm biệt', 'hihi' => 'biến'];
    $rs = $request->word;

    foreach ($lists as $key => $value) {
        if ($rs == $key) {
            return view('dictionary', compact('value'));
        }
    }
});

Route::group(['prefix' => 'user'], function(){
	Route::get('/profile', function(){
		return redirect('/user/login');
	});

	Route::get('/login', function(){
		return 'login web here';
	});
});

Route::get('/time', function(){
        return view('index');   
});

Route::get('/timezone', function(Request $request){
    if(isset($request->location)){
        $location = $request->location;
        $todayDate = Carbon::now($location)->format('Y-m-d h:i:s');
        echo 'Múi giờ bạn chọn ' . $location . ' hiện tại đang là: ' . $todayDate;
    }
});


Route::prefix('/taskManager')->group(function () {
    Route::get('/index', [TaskController::class, 'index'])->name('taskManager.index');
    Route::get('/create', [TaskController::class, 'create'])->name('taskManager.create');
});

Route::post('/store', [TaskController::class, 'store'])->name('taskManager.store');

Route::get('/blade', function () {
    return view('childen');
});

Route::prefix('/customer')->group(function () { 
    Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/create', [CustomerController::class, 'store'])->name('customers.store');
});

Route::get('/{id}/delete', [CustomerController::class, 'delete'])->name('customers.delete');

Route::get('/{id}/edit', [\App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/{id}/edit', [\App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');

Route::get('/insert', function () {
    DB::table('posts')->insertGetId([
        'title' => 'vo',
        'body' => 'hello',
    ]);
});

Route::get('/select', function () {
    $users = DB::table('posts')->select()->where('id', '=', '1')->get();
    dd($users);
});

Route::get('/update', function () {
    $update = DB::table('posts')->where('id', '=', 1)->update(['title' => 'new Book']);
    dd($update);
});

Route::get('/delete', function () {
    $delete = DB::table('posts')->where('id', '=', 1)->delete();
    dd($delete);
});

Route::post('/search', [CustomerController::class, 'search'])->name('customer.search');
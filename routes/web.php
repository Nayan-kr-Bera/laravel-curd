<?php
use App\Http\Controllers\productcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('products.create');
});
Route::get('products/create',[productcontroller::class,'create'])->name('products.create');
Route::post('/products',[productcontroller::class,'store'])->name('products.store');
Route::get('/products',[productcontroller::class,'index'])->name('products.index');
Route::get('/products/{product}/edit',[productcontroller::class,'edit'])->name('products.edit');
Route::put('/products/{product}',[productcontroller::class,'update'])->name('products.update');
Route::delete('/products/{product}',[productcontroller::class,'delete'])->name('products.delete');

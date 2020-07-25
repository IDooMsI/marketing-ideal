<?php

use App\Category;
use App\Http\Controllers\HomeController;
use App\Job;
use App\Service;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('index');
});

Route::group(['middleware'=>'auth'],function(){

    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');

    Route::get('/service/{id}/delete', 'ServiceController@destroy')->name('service.delete');
    Route::resource('service','ServiceController');

    Route::get('/spec/{id}/delete', 'SpecController@destroy')->name('spec.delete');
    Route::resource('spec','SpecController');

    Route::get('/job/{id}/delete', 'JobController@destroy')->name('job.delete');
    Route::resource('job','JobController');

    Route::get('/subcategory/{id}/delete', 'SubcategoryController@destroy')->name('subcategory.delete');
    Route::resource('subcategory','SubcategoryController');
    
    Route::get('/calculate', 'SponsorController@expirationCalculate')->name('sponsor.calculate');
    Route::get('/sponsor/{id}/delete', 'SponsorController@destroy')->name('sponsor.delete');
    Route::resource('sponsor', 'SponsorController');

    Route::get('/locality/{id}/delete', 'LocalityController@destroy')->name('locality.delete');
    Route::resource('locality', 'LocalityController');
});


Route::get('/servicios/{id}', 'HomeController@showServices')->name('show.services');
Route::get('/trabajos/{id}', 'HomeController@showJobs')->name('show.jobs');
Route::get('/publicidades/pagina/{page}/publicidad/', 'HomeController@showSponsors')->name('show.sponsors');
Route::get('publicidad/{id}','HomeController@showSponsor')->name('show.sponsor');
Route::get('/contacto',function(){
    return view('contact');
})->name('contact');

View::composer('layouts.app', function ($view) {
    $service = Category::with('subcategories')->where('name','nuestros servicios')->first();
    $work = Category::with('subcategories')->where('name','nuestros trabajos')->first();
    $view->with(['work'=> $work, 'service'=>$service]);
});

Auth::routes();

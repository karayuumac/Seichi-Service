<?php

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

Route::get('/', 'MainController@index')->name('index');
Route::get('/policy', 'MainController@policy')->name('policy');

Route::get('/crowdfunding/about', 'CrowdfundingController@about')->name('crowdfunding.about');
Route::get('/crowdfunding', 'CrowdfundingController@index')->name('crowdfunding');
Route::get('/crowdfunding/create', 'CrowdfundingController@create')->name('crowdfunding.create');
Route::post('/crowdfunding', 'CrowdfundingController@store')->name('crowdfunding.store');
Route::get('/crowdfunding/{id}', 'CrowdfundingController@show')->name('crowdfunding.show');

Route::get('/contact', 'InquiryController@form')->name('contact');
/*Route::post('/contact/confirm', 'InquiryController@confirm')->name('confirm');*/
Route::post('/contact/process', 'InquiryController@process')->name('process');
//processはGETを呼ばれるとエラーが出るのでリダイレクト
Route::get('/contact/process', function () {
  return redirect()->route('contact');
});

//sitemap.xml用
Route::get('sitemap.xml', 'SitemapController@xml')->name('sitemap.xml');
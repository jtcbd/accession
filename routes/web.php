<?php

Route::get('/', function () {
    return redirect('login');
});

Route::get('accessions', 'AccessionsController@index')->name('accessions.index');
Route::get('accessions/create', 'AccessionsController@create')->name('accessions.create');
Route::get('accessions/{accession}', 'AccessionsController@show')->name('accessions.show');
Route::post('accessions', 'AccessionsController@store')->name('accessions.store');
Route::post('accessions/{accession}/approve', 'AccessionsController@approve')->name('accession.approve');
// Approval System
Route::get('accessions/status/pending', 'AccessionApprovalsController@pending')->name('accessions.pending.index');
Route::get('accessions/status/approved', 'AccessionApprovalsController@approved')->name('accessions.approved.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

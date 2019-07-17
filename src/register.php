<?php

Route::middleware(['web'])->group(function () {
    Route::get('vies/vat/form', 'Ssaran\Vies\Controller\VatTestController@index')->name('api.vies.vat.form');
    Route::post('vies/vat/check', 'Ssaran\Vies\Controller\VatTestController@check')->name('api.vies.vat.check');
});

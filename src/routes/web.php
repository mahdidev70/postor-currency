<?php

Route::middleware(['auth', 'web', 'CheckAdmin'])->prefix('admin')->group(function () {
    Route::group(['prefix' => 'currency'], function () {
        Route::get('/index', [CurrencyController::class, 'index'])->name('currency.index');
        Route::get('/create', [CurrencyController::class, 'create'])->name('currency.create');
        Route::post('/store', [CurrencyController::class, 'store'])->name('currency.store');
        Route::get('/edit/{id}', [CurrencyController::class, 'edit'])->name('currency.edit');
        Route::patch('/update', [CurrencyController::class, 'update'])->name('currency.update');
        Route::delete('/delete', [CurrencyController::class, 'delete'])->name('currency.delete');
        
        Route::post('/action', [CurrencyController::class, 'updateProductPrice'])->name('currency.action.update');
    });
});

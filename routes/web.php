<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{FuncionarioController};
use App\Http\Controllers\{ProdutoController};

// ORDEM D.U.E.C.S.I
# destroy
# update
# edit
# create
# store
# index

// Admin
Route::group(['middleware' => ['auth', 'permission:admin']], function () {
    // FUNCIONÁRIOS
    Route::delete('/funcionarios/{id}', [FuncionarioController::class, 'destroy'])->name("funcionarios.destroy");

    Route::put('/funcionarios/{id}', [FuncionarioController::class, 'update'])->name('funcionarios.update');

    Route::get('/funcionarios/{id}/editar', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');

    Route::get('/funcionarios/cadastrar', [FuncionarioController::class, 'create'])->name('funcionarios.create');

    Route::post('/funcionarios', [FuncionarioController::class, 'store'])->name('funcionarios.store');

    Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');
    
});

// Admin e Funcionário
Route::group(['middleware' => ['auth','permission:admin|func']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // PRODUTOS
    Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');

    Route::put('/produtos/{id}', [ProdutoController::class, 'update'])->name('produtos.update');

    Route::get('/produtos/{id}/editar', [ProdutoController::class, 'edit'])->name('produtos.edit');

    Route::get('/produtos/cadastrar', [ProdutoController::class, 'create'])->name('produtos.create');

    Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
    
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');

});

Route::get('/', [ProdutoController::class, 'home'])->name('home');

require __DIR__.'/auth.php';

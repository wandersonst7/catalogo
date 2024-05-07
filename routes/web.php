<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{CategoriaController, FuncionarioController};
use App\Http\Controllers\{HomeController, ProdutoController};

// ORDEM D.U.E.C.S.I
# destroy
# update
# edit
# create
# store
# index

// Admin
Route::group(['middleware' => ['auth', 'permission:admin']], function () {

    // CATEGORIAS
    Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');

    Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');

    Route::get('/categorias/{id}/editar', [CategoriaController::class, 'edit'])->name('categorias.edit');

    Route::get('/categorias/cadastrar', [CategoriaController::class, 'create'])->name('categorias.create');

    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
    
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');


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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/categoria/{categoria:nome}',[HomeController::class, 'categoria'])->name('categoria.show');
Route::get('/produtos/{id}/visualizar', [ProdutoController::class, 'show'])->name('produtos.show');

require __DIR__.'/auth.php';

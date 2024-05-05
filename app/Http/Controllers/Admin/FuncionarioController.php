<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateFuncionarioRequest;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller
{
    //
    public function index(Request $request, User $user){

        $funcionarios = null;

        // Realizando busca
        if($request->busca){
            // $funcionarios = $user->where([
            //     ['username', 'like', '%'.$request->busca.'%']
            // ])->get()->filter(function($user) {
            //     return $user->hasPermissionTo('func');
            // });

        }else{
            // $funcionarios = $user->all()->filter(function($user) {
            //     return $user->hasPermissionTo('func');
            // })->paginate(2);

            $funcionarios = $user->query()->paginate(2);
        }

        return view('admin.funcionarios.index', [
            'funcionarios' => $funcionarios,
            'busca' => $request->busca
        ]);
    }

    public function create(){
        return view('admin.funcionarios.form', ['funcionario' => new User()]);
    }

    public function store(StoreUpdateFuncionarioRequest $request, User $user){

        $user->create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ])->givePermissionTo('func');

        return redirect()->route('funcionarios.index');
    }

    public function edit(int $id, User $user){
        $funcionario = $user->all()->filter(function($user){
            return $user->hasPermissionTo('func');
        })->where('id', '=', $id)->first();

        if(!$funcionario){
            return redirect()->back();
        }

        return view('admin.funcionarios.form', [
            'funcionario'=>$funcionario
        ]);
    }

    public function update(int $id, User $user, StoreUpdateFuncionarioRequest $request){
        $funcionario = $user->all()->filter(function($user){
            return $user->hasPermissionTo('func');
        })->where('id', '=', $id)->first();

        if(!$funcionario){
            return back();
        }

        $funcionario->update($request->validated());

        return redirect()->route('funcionarios.index');
    }

    public function destroy(int $id, User $user){
        $user = $user->where('id', '=', $id)->first();

        if(!$user){
            return back();
        }
        
        $user->delete();
        return redirect()->route("funcionarios.index");
    }
}

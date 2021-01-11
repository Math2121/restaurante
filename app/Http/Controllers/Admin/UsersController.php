<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function index(){
        $user = User::where('id',Auth::user()->id);
        return view('admin.users.index',['user'=>$user]);
    }
    public function new(){
        return view('admin.users.store');
    }
    public function store(UserRequest $req){
        //recebendo os dados do form
        $userData = $req->all();

        $req->validated();

        $userData['password'] = bcrypt($userData['password']);
        //Inserindo os dados no banco
        $user =  User::create($userData);

        print 'Usuário criado';
    }
    public function update(User $id){
        return view('admin.users.edit',['id'=>$id]);
    }

    public function edit(UserRequest $request,$id){
            //recebendo os dados do form
            $userData = $request->all();
            $request->validated();
            //Busacando usuário
            if($userData['password']){
                $userData['password'] = bcrypt($userData['password']);
            }
            $user =  User::find($id);
            //Atualizando dados segundo o id
            $user->update($userData);

            print 'Usuário atualizado';
    }

    public function remove($id){



        //Busacando usuário
        $user =  User::find($id);
        //Deletando usuário
        $user->delete();

        print 'Usuário removido';
}


}
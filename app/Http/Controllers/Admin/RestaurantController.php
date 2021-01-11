<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Requests\RestaurantRequest;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    //
    public function index(){
        $restaurant = Restaurant::where('owner_id',Auth::user()->id)->get();
        return view('admin.restaurants.index',['restaurant'=>$restaurant]);
    }
    public function new(){
        return view('admin.restaurants.store');
    }
    public function store(RestaurantRequest $req){
        //recebendo os dados do form
        $restauranteData = $req->all();
        $req->validated();
        $user = Auth::user();
        $user->restaurants()->create($restauranteData);
        //Inserindo os dados no banco
            flash('Restaurante criado com sucesso')->success();
        return redirect()->route('restaurant.index');

    }
    public function update(Restaurant $id){
        return view('admin.restaurants.edit',['id'=>$id]);
    }

    public function edit(RestaurantRequest $request,$id){
            //recebendo os dados do form
            $restauranteData = $request->all();
            $request->validated();
            //Busacando usuário
            $restaurant =  Restaurant::find($id);
            //Atualizando dados segundo o id
            $restaurant->update($restauranteData);
            flash('Restaurante atualizado')->success();
            return redirect()->route('restaurant.index');

    }

    public function remove($id){



        //Busacando usuário
        $restaurant =  Restaurant::find($id);
        //Deletando usuário
        $restaurant->delete();

        flash('Restaurante removido')->success();
        return redirect()->route('restaurant.index');
}
}

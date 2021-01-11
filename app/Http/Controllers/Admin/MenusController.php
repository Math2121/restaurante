<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class MenusController extends Controller
{
    //
    public function index(){
        $restaurants = Auth::user()->restaurants()->select('id')->get()->toArray();
        $menu= Menu::whereIn('restaurant_id',$restaurants)->get();
        return view('admin.menu.index',['menu'=>$menu]);
    }
    public function new(){
          $restaurants = Restaurant::where('owner_id',Auth::user()->id)->get();

        return view('admin.menu.store',['restaurant'=>$restaurants]);
    }
    public function store(MenuRequest $req){
        //recebendo os dados do form
        $menuData = $req->all();
        $req->validated();
        //Inserindo os dados no banco
        $menu =  Restaurant::find($menuData['restaurant_id']);
        $menu->menus()->create($menuData);
        flash('Menu criado com sucesso')->success();
        return redirect()->route('menu.index');

    }
    public function update(Menu $id){
        $restaurants = Restaurant::where('owner_id',Auth::user()->id)->get();
        return view('admin.menu.edit',['id'=>$id,'restaurant'=>$restaurants]);
    }

    public function edit(MenuRequest $request,$id){
            //recebendo os dados do form
            $menuData = $request->all();
            $request->validated();
            //Busacando usuário
            $menu =  Menu::find($id);
            $menu->restaurant()->associate($menuData['restaurant_id']);
            $menu->update($menuData);
            flash('Menu atualizado')->success();
            return redirect()->route('menu.index');

    }

    public function remove($id){



        //Busacando usuário
        $menu =  Menu::find($id);
        //Deletando usuário
        $menu->delete();

        flash('Menu removido')->success();
        return redirect()->route('menu.index');
}
}

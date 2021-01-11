<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantPhotoController extends Controller
{
    //

    public function index($id){
        $restaurant_id = $id;
        return view('admin.restaurants.photos.index',['restaurant_id'=>$restaurant_id]);
    }
    public function save(Request $req, $id ){
        foreach($req->file('photos') as $photo){
            $newName = sha1($photo->getClientOriginalName()).microtime().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('images'),$newName);
            $restaurant = Restaurant::find($id);
            $restaurant->photos()->create([
                'photo'=>$newName
            ]);

        }
        flash()->success('Upload mfeito com sucesso!');
        return redirect()->route('restaurant.photo',['id'=>$id]);
    }
}

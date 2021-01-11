@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col-12">
        <h1>Cadastro de Fotos do seu Restaurante</h1>
        <hr>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('restaurant.post',['id'=>$restaurant_id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="photo">Carregar foto</label>
                    <input type="file" name="photos[]" id="photo" multiple>
                </div>

                <div class="form-group">
                <button type="submit" class="btn btn-lg btn-success">Carregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

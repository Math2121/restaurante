@extends('layouts.app')
@section('content')




<div class="container mt-5">
<form action="{{route('menu.update',['id'=>$id->id])}}" method="post">
    {{-- O laravel nã permite envio de formulário não autenticado pelo token --}}
    {{ csrf_field() }}

    {{-- printar token  --}}
    {{-- {{csrf_token()}} --}}
  <div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control  @if($errors->has('name')) is-invalid @endif" name="name" value="{{$id->name}}">
  @if ($errors->has('name'))

  <span class="invalid-feedback" role="alert">
         <strong>{{$errors->first('name')}}</strong>
      </span>
@endif
  </div>

  <div class="form-group">
    <label for="price">Preço: </label>
    <input type="text" class="form-control @if($errors->has('price')) is-invalid @endif" name="price" value="{{$id->price}}">
    @if ($errors->has('price'))

 <span class="invalid-feedback" role="alert">
         <strong>{{$errors->first('price')}}</strong>
      </span>
@endif
  </div>


      <div class="form-group">
    <label for="price">Restaurante: </label>
        <select name="restaurant_id" id="" class="form-control">
            <option value="">Selecione um Restaurante para este item</option>
            @foreach ($restaurant as $res)
        <option
        value="{{$res->id}}"
        @if ($id->restaurant_id == $res->id)
            selected
        @endif

        >{{$res->name}}</option>
            @endforeach
        </select>
 @if ($errors->has('restaurant_id'))

 <span class="invalid-feedback" role="alert">
         <strong>{{$errors->first('restaurant_id')}}</strong>
      </span>
@endif
  </div>

<button type="submit" class="btn btn-success">Atualizar</button>
</form>
</div>
@endsection

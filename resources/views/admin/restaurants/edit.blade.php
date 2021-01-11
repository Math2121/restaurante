@extends('layouts.app')
@section('content')




<div class="container mt-5">
<form action="{{route('restaurant.update',['id'=>$id->id])}}" method="post">
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
    <label for="address">Endereço: </label>
    <input type="text" class="form-control @if($errors->has('address')) is-invalid @endif" name="address" value="{{$id->address}}">
    @if ($errors->has('address'))

 <span class="invalid-feedback" role="alert">
         <strong>{{$errors->first('address')}}</strong>
      </span>
@endif
  </div>

  <div class="form-group">
    <label for="description">Descrição</label>
    <textarea class="form-control  @if($errors->has('description')) is-invalid @endif" id="description" rows="5" name="description" >{{$id->description}}</textarea>
    @if ($errors->has('description'))

<span class="invalid-feedback" role="alert">
         <strong>{{$errors->first('description')}}</strong>
      </span>
@endif
  </div>

<button type="submit" class="btn btn-success">Atualizar</button>
</form>
</div>
@endsection
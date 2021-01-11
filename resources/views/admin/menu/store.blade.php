@extends('layouts.app')
@section('content')

<div class="container mt-5">
    {{-- {{var_dump(dd($errors->all()))}} --}}
<form action="{{route('menu.store')}}" method="post">

    {{-- O laravel nã permiote envio de formulário não autenticado pelo token --}}
    {{ csrf_field() }}

    {{-- printar token  --}}
    {{-- {{csrf_token()}} --}}


  <div class="form-group">
    <label for="name">Nome</label>
  <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" name="name" value="{{old('name')}}">
    {{-- Para mostrar mensagens de erros na hora de enviar uma request --}}
    @if ($errors->has('name'))
    {{-- Pega todos os erros do input --}}
        {{-- @foreach ($errors->get('name') as $n)
            {{$n}}
        @endforeach --}}
        <span class="invalid-feedback" role="alert">
         <strong>{{$errors->first('name')}}</strong>
      </span>
    @endif
  </div>



  <div class="form-group">
    <label for="price">Preço: </label>
    <input type="text" class="form-control @if($errors->has('price')) is-invalid @endif" name="price">
    @if ($errors->has('price'))

 <span class="invalid-feedback" role="alert">
         <strong>{{$errors->first('price')}}</strong>
      </span>
@endif
  </div>

    <div class="form-group">
    <label for="price">Preço: </label>
        <select name="restaurant_id" id="" class="form-control">
            <option value="">Selecione um Restaurante para este item</option>
            @foreach ($restaurant as $res)
        <option value="{{$res->id}}">{{$res->name}}</option>
            @endforeach
        </select>
 @if ($errors->has('restaurant_id'))

 <span class="invalid-feedback" role="alert">
         <strong>{{$errors->first('restaurant_id')}}</strong>
      </span>
@endif
  </div>

<button type="submit" class="btn btn-success">Enviar</button>
</form>
</div>


@endsection

@extends('layouts.app')
@section('content')

<div class="container mt-5">
    {{-- {{var_dump(dd($errors->all()))}} --}}
<form action="{{route('restaurant.store')}}" method="post">

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
    <label for="address">Endereço: </label>
    <input type="text" class="form-control @if($errors->has('address')) is-invalid @endif " name="address" value="{{old('address')}}">
    @if ($errors->has('address'))
    <span class="invalid-feedback" role="alert">
         <strong>{{$errors->first('address')}}</strong>
      </span>
        
    @endif
  </div>

  <div class="form-group">
    <label for="description">Descrição</label>
    <textarea class="form-control @if($errors->has('description')) is-invalid @endif" id="description" rows="5" name="description" value="{{old('description')}}"></textarea>
    @if ($errors->has('description'))

         <span class="invalid-feedback" role="alert">
         <strong>{{$errors->first('description')}}</strong>
      </span>
        
    @endif
  </div>

<button type="submit" class="btn btn-success">Enviar</button>
</form>
</div>


@endsection
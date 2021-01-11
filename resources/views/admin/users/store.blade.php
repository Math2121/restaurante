@extends('layouts.app')
@section('content')

<div class="container mt-5">
    {{-- {{var_dump(dd($errors->all()))}} --}}
<form action="{{route('user.store')}}" method="post">

    {{-- O laravel nã permiote envio de formulário não autenticado pelo token --}}
    {{ csrf_field() }}

    {{-- printar token  --}}
    {{-- {{csrf_token()}} --}}


  <div class="form-group">
    <label for="name">Nome</label>
  <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" name="name" value="{{old('name')}}">
   
    @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
         <strong>{{$errors->first('name')}}</strong>
      </span>
    @endif
  </div>

  <div class="form-group">
    <label for="email">E-mail: </label>
    <input type="e-mail" class="form-control @if($errors->has('email')) is-invalid @endif " name="email" value="{{old('email')}}">
    @if ($errors->has('email'))
    <span class="invalid-feedback" role="alert">
         <strong>{{$errors->first('email')}}</strong>
      </span>
        
    @endif
  </div>

    <div class="form-group">
    <label for="password">senha: </label>
    <input type="password" class="form-control @if($errors->has('password')) is-invalid @endif " name="password" value="{{old('password')}}">
    @if ($errors->has('password'))
    <span class="invalid-feedback" role="alert">
         <strong>{{$errors->first('password')}}</strong>
      </span>
        
    @endif
  </div>



  <div class="form-group">
    <label for="password_confirmation">Confirmar senha: </label>
    <input type="password" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif " name="password_confirmation" value="{{old('password_confirmation')}}">
    @if ($errors->has('password_confirmation'))
    <span class="invalid-feedback" role="alert">
         <strong>{{$errors->first('password_confirmation')}}</strong>
      </span>
        
    @endif
  </div>

<button type="submit" class="btn btn-success">Enviar</button>
</form>
</div>


@endsection
@extends('layouts.app')
@section('content')




<div class="container">
<a href="{{route('menu.new')}}" class="float-right btn btn-success">Novo</a>
<h1 class="float-left">Menu</h1>


<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Restaurante</th>
            <th>Criado em</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
@foreach ($menu as $item)
<tr>
    <td>
        {{$item->id}}
    </td>
    <td>{{$item->name}}</td>
    <td><a href="{{route('restaurant.edit',['id'=>$item->id])}}">{{$item->name}}</a></td>
    <td>{{$item->created_at}}</td>
    <td>
        <a href="{{route('menu.edit',['id'=>$item->id])}}" class="float-right btn btn-primary">EDIT</a>
        <a href="{{route('menu.delete',['id'=>$item->id])}}" class="float-right btn btn-danger">EXCLUIR</a>
    </td>
</tr>
@endforeach
    </tbody>
</table>


</div>















@endsection

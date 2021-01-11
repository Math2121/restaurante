@extends('layouts.app')
@section('content')




<div class="container">
<a href="{{route('restaurant.new')}}" class="float-right btn btn-success">Novo</a>
<h1 class="float-left">Restaurantes</h1>


<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Criado em</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
@foreach ($restaurant as $item)
<tr>
    <td>
        {{$item->id}}
    </td>
    <td>{{$item->name}}</td>
    <td>{{$item->created_at}}</td>
    <td>
        <a href="{{route('restaurant.edit',['id'=>$item->id])}}" class=" btn btn-primary">EDIT</a>
        <a href="{{route('restaurant.photo',['id'=>$item->id])}}" class=" btn btn-warning">FOTOS</a>
        <a href="{{route('restaurant.delete',['id'=>$item->id])}}" class=" btn btn-danger">EXCLUIR</a>
    </td>
</tr>
@endforeach
    </tbody>
</table>


</div>















@endsection

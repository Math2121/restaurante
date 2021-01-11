@extends('layouts.app')
@section('content')




<div class="container">
<a href="{{route('user.new')}}" class="float-right btn btn-success">Novo</a>
<h1 class="float-left">Usuários</h1>


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
@foreach ($user as $item)
<tr>
    <td>
        {{$item->id}}
    </td>
    <td>{{$item->name}}</td>
    <td>{{$item->created_at}}</td>
    <td>
        <a href="{{route('user.edit',['id'=>$item->id])}}" class="float-right btn btn-primary">EDIT</a>
        <a href="{{route('user.delete',['id'=>$item->id])}}" class="float-right btn btn-danger">EXCLUIR</a>
    </td>
</tr>
@endforeach
    </tbody>
</table>


</div>















@endsection
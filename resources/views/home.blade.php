@extends('layouts.app')

@section('content')
<div class="container">
<h1>Restaurantes</h1>
<hr>
    <div class="row">
        @foreach ($restaurant as $item)
            <div class="col-4">
                @if ($item->photos()->count())
                 <img src="{{asset('/images/'.$item->photos()->first()->photo)}}" alt="" class="img-fluid">
                @endif

                <h2>
                    <a href="{{route('home.single',['id'=>$item->id])}}">{{$item->name}}</a>
                </h2>
                <p>{{$item->description}}</p>
            </div>
        @endforeach
         {{$restaurant->links()}}
    </div>

</div>
@endsection

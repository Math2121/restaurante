@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row mt-5">
        <div class="col-12">
            <h2>{{$id->name}}</h2>
            <hr>
            <p>{{$id->description}}</p>
            <p><address>Endereço: {{$id->address}}</address></p>
        </div>
        <div class="col-12">
            Cardápio:
            <ul class="list-group">
                @foreach ($id->menus as $item)
                    <li class="list-group-item">{{$item->name}} <br>
                    R${{number_format($item->price,'2',',','.')}}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-12">
            <h2>Fotos</h2>
            <hr>
        </div>
        <div class="col-12">
            @if ($id->photos()->count())
              @foreach ($id->photos as $photo)
              <div class="col-4">
                    <img src="{{asset('/images/'.$photo->photo)}}" alt="" class="img-fluid" width="200px" height="300px">
              </div>
        @endforeach
                @else

                <span class="alert alert-warning">Sem fotos para este Restaurante</span>

            @endif
        </div>
    </div>

</div>
@endsection

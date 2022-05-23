
@extends('layouts.app')

 @section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                @foreach ($menus as $menu)
                
                    <div class="card-header">{{$menu->title}}</div>
    
                    <div class="card-body">

                        <form method="POST" action="{{route('menu.destroy', [$menu])}}">
                            @csrf
                            <button class="btn btn-danger" type="submit">DELETE</button>
                        </form>
                        
                        <a class="btn btn-success" href="{{route('menu.edit',[$menu])}}">EDIT</a>
                    </div>

                    <div>
                        Šis patiekalas pateikiamas šiose kebabinėse:

                        @foreach (App\FindRestaurants::restaurantsThatUseThisMenu($menu) as $restaurant)
                        {{$restaurant->title}},
                        @endforeach
                        
                    </div>

                    <img src="{{asset('pictures/'.$menu->picture.'')}}" alt="{{$menu->picture}}">

                @endforeach
            </div>
        </div>
    </div>
 </div>
 @endsection
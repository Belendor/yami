@extends('layouts.app')

 @section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                @foreach ($restaurants as $restaurant)
                
                    <div class="card-header">{{$restaurant->title}} Yami</div>
    
                    <div class="card-body">

                        <form method="POST" action="{{route('restaurant.destroy', [$restaurant])}}">
                            @csrf
                            <button class="btn btn-danger" type="submit">DELETE</button>
                        </form>
                        
                        <a class="btn btn-success" href="{{route('restaurant.edit',[$restaurant])}}">EDIT</a>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
 </div>
 @endsection
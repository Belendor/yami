@extends('layouts.app')

 @section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sukurti naują kebabinę</div>
 
                <div class="card-body">

                    <form method="POST" action="{{route('restaurant.store')}}">

                        <div class="form-group">
                            <label>Naujos picerijos pavadinimas</label>
                            <input class="form-control" type="text" name="restaurant_name">
                        </div>

                        <div class="form-group">
                            <label>Darbuotojų skaičius</label>
                            <input class="form-control" type="number" name="employee_count" min="0">
                        </div>

                        <div class="form-group">
                            <label>Vartotojų skaičius</label>
                            <input class="form-control" type="number" name="customer_count" min="0">
                        </div>
                        

                        <label>Pasirinkti meniu</label>
                        <select name="menu_id">
                            @foreach ($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->title}}</option>
                            @endforeach
                        </select>
                        
                        @csrf
                        <button type="submit">ADD</button>
                     </form>

                </div>
            </div>
        </div>
    </div>
 </div>
 @endsection
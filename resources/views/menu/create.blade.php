@extends('layouts.app')

 @section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sukurti naują meniu</div>
 
                <div class="card-body">

                    <form method="POST" action="{{route('menu.store')}}" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Patiekalo pavadinimas</label>
                            <input class="form-control" type="text" name="menu_name">
                        </div>

                        <div class="form-group">
                            <label>Patiekalo kaina</label>
                            <input class="form-control" type="number" name="menu_price" min="0" step="0.01">
                        </div>

                        <div class="form-group">
                            <label>Patiekalo svoris (g)</label>
                            <input class="form-control" type="number" name="menu_weight" min="0">
                        </div>

                        <div class="form-group">
                            <label>Mėsos kiekis porcijoje (g)</label>
                            <input class="form-control" type="number" name="menu_meat" min="0">
                        </div>

                        <div class="form-group">
                            <label>Patiekalo aprašymas</label>
                            <textarea id="summernote" class="form-control summernote" type="text" name="menu_about" ></textarea>
                        </div>

                        <div class="form-group">
                            <label>Pridėti nuotrauką (optional)</label><br>
                            <input form-control id="file-input" type="file" name="picture"><br>
                        </div>

                        @csrf
                        <button class="btn btn-success" type="submit">Pridėti</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
 </div>

 @endsection
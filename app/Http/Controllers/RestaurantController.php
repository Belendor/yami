<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;
use App\Menu;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();

        return view('restaurant.index', ['restaurants' => $restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $menus = Menu::orderBy('title')->get();

        return view('restaurant.create', ['menus' => $menus]);

    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = new Restaurant;

        $restaurant->title = $request->restaurant_name;
        $restaurant->customer = $request->customer_count;
        $restaurant->employees = $request->employee_count;
        $restaurant->menu_id = $request->menu_id;
        $restaurant->picture = 'defaultr.jpg';

        $restaurant->save();

        return redirect()->route('restaurant.create')->with('success_message', 'Nauja Kebabinė sukurta sekmingai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {

        $menus = Menu::orderBy('title')->get();
        return view('restaurant.edit', ['menus' => $menus], ['restaurant' => $restaurant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->title = $request->restaurant_name;
        $restaurant->customer = $request->customer_count;
        $restaurant->employees = $request->employee_count;
        $restaurant->menu_id = $request->menu_id;
        $restaurant->picture = 'defaultr.jpg';
        $restaurant->save();

        return redirect()->route('restaurant.index')->with('success_message', 'Atnaujinta sekmingai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('restaurant.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}

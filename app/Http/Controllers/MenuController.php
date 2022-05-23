<?php

namespace App\Http\Controllers;
use Validator;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->menu_weight < $request->menu_meat){
            return redirect()->back()->with('success_message', 'Mesos daugiau nei produkto svoris');
        }

        $menu = new Menu;

        $menu->title = $request->menu_name;
        $menu->price = $request->menu_price;
        $menu->weigth = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        $menu->about = $request->menu_about;


        if ($request->hasFile('picture')) {

            $image = $request->file('picture');

            $name = $request->file('picture')->getClientOriginalName();

            $destinationPath = public_path('/pictures');

            $image->move($destinationPath, $name);

            $menu->picture = $name;
        }else{
            $menu->picture = "default.jpg";
        }

        $menu->save();
        return redirect()->route('menu.create')->with('success_message', 'Naujas patiekalas pridetas sekmingai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        if($request->menu_weight < $request->menu_meat){
            return redirect()->back()->with('success_message', 'Mesos daugiau nei produkto svoris');
        }
        
        $menu->title = $request->menu_name;
        $menu->price = $request->menu_price;
        $menu->weigth = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        $menu->about = $request->menu_about;

        if ($request->hasFile('picture')) {

            $image = $request->file('picture');

            $name = $request->file('picture')->getClientOriginalName();

            $destinationPath = public_path('/pictures');

            $image->move($destinationPath, $name);

            $menu->picture = $name;
        }else{
            $menu->picture = "default.jpg";
        }

        $menu->save();
        return redirect()->route('menu.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index')->with('success_message', 'Sekmingai ištrintas.');
        
    }
}

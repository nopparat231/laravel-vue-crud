<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all()->toArray();
        return array_reverse($menus);      
    }

    
    public function store(Request $request)
    {
        $menu = new Menu([
            'user_id'      => '1',
            'restaurant_id'=> '1',
            'menu_name'    => $request->input('menu_name'),
            'menu_img'     => $request->input('menu_img'),
            'menu_detail'  => '1',
            'menu_status'  => '0'
        ]);
        $menu->save();

        return response()->json('Menu created!');
    }

    public function show($id)
    {
        $menu = Menu::find($id);

        return response()->json($menu);
    }

    public function update($id, Request $request)
    {
        $menu = Menu::find($id);
        $menu->update($request->all());

        return response()->json('Menu updated!');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        return response()->json('Menu deleted!');
    }

}

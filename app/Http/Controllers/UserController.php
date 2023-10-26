<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data = Menu::all();
        return view('pages.user.index')->with(['menu' => $data]);
    }

    public function cartStore($id){
        $menu = Menu::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            $cart[$id]['jumlah']++;
        }else{
            $cart[$id] = [
                'nama' => $menu->Menu,
                'jumlah' => 1,
                'harga' => $menu->harga,
                'gambar' => $menu->gambar
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }
}

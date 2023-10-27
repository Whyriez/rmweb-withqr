<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data = Menu::all();
        $kate = Kategori::all();
        return view('pages.user.index')->with(['menu' => $data, 'kategori' => $kate]);
    }

    public function showKategori($name){
        $data = Menu::where('kategori', $name)->get();
        $kate = Kategori::all();
        return view('pages.user.index')->with(['menu' => $data, 'kategori' => $kate]);
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

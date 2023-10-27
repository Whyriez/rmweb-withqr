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

    public function showKategori($id){
        $data = Menu::where('kategori_id', $id)->get();
        $kate = Kategori::all();
        return view('pages.user.index')->with(['menu' => $data, 'kategori' => $kate]);
    }

    public function viewCart(){
        return view('pages.user.cart');
    }

    public function cartStore($id){
        $menu = Menu::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            $cart[$id]['jumlah']++;
        }else{
            $cart[$id] = [
                'id' => $id,
                'nama' => $menu->Menu,
                'jumlah' => 1,
                'harga' => $menu->harga,
                'gambar' => $menu->gambar
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function cartUpdate(Request $request){
        $id = $request->id;

        $cart = $request->session()->get('cart');

        if(isset($cart[$id])) {
            $cart[$id]['jumlah'] = $request->input('jumlah');
            $request->session()->put('cart', $cart);
        }
    
        return redirect()->back();
    }

    public function cartDelete(Request $request, $id){

        $request->session()->forget('cart.' . $id);

        return redirect()->back();
    }
}

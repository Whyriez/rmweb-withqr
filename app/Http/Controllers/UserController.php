<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index($id = null){
        $encodedHash = base64_decode($id);
        if($id != null){
            $meja = $encodedHash;
            Session::put('idMeja', $meja);
            return redirect()->route('home'); 
        }
     
        $data = Menu::all();
        $kate = Kategori::all();
        return view('pages.user.index')->with(['menu' => $data, 'kategori' => $kate,  'id' => $encodedHash]);
    }

    public function showKategori($id){
        $data = Menu::where('kategori_id', $id)->get();
        $kate = Kategori::all();
        return view('pages.user.index')->with(['menu' => $data, 'kategori' => $kate]);
    }

    public function store(Request $request){
        $meja = $request->idMejaSementara;
        Session::put('idMeja', $meja);
        return redirect()->route('home'); 
    }

    public function deleteSession(){
        Session::forget('idMeja');
        return view('pages.user.index');
    }

    public function viewCart(){
        return view('pages.user.cart');
    }

    public function cartStore($id){
        $menu = Menu::find($id);
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
        $ids = $request->input('id');
        $quantities = $request->input('jumlah');

        $cart = $request->session()->get('cart');

        foreach($ids as $index => $id) {
            if(isset($cart[$id])) {
                $cart[$id]['jumlah'] = $quantities[$index];
            }
        }

        $request->session()->put('cart', $cart);

        // if(isset($cart[$id])) {
        //     $cart[$id]['jumlah'] = $request->input('jumlah');
        //     $request->session()->put('cart', $cart);
        // }
    
        return redirect()->back();
    }

    public function cartDelete(Request $request, $id){

        $request->session()->forget('cart.' . $id);

        return redirect()->back();
    }

    public function cartCheckout(Request $request){
        $cart = $request->session()->get('cart');
        $noPesanan = 'INV-' . date('Ymd') . '-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
        $tanggalOrder = date('Y-m-d');
        $total = 0;

        Transaksi::create([
            'no_pesanan' => $noPesanan,
            'tgl_order' => $tanggalOrder,
            'total_bayar' => $total,
        ]);
        
        foreach ($cart as $item) {
            $total += $item['jumlah'] * $item['harga'];
            DetailTransaksi::create([
                'no_psn' => $noPesanan,
                'id_menu' => $item['id'],
                'qty' => $item['jumlah'],
                'meja' => 1,
            ]);
        }
       
        $request->session()->forget('cart');
        $request->session()->forget('idMeja');
    
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index($id = null)
    {
        $encodedHash = base64_decode($id);
        if ($id != null) {
            $meja = $encodedHash;
            Session::put('idMeja', $meja);
            return redirect()->route('home');
        }

        $data = Menu::all();
        $kate = Kategori::all();
        return view('pages.user.index')->with(['menu' => $data, 'kategori' => $kate,  'id' => $encodedHash]);
    }

    public function about()
    {
        return view('pages.user.about');
    }

    public function showKategori($id)
    {
        $data = Menu::where('kategori_id', $id)->get();
        $kate = Kategori::all();
        return view('pages.user.index')->with(['menu' => $data, 'kategori' => $kate]);
    }

    public function store(Request $request)
    {
        $meja = $request->idMejaSementara;
        Session::put('idMeja', $meja);
        return redirect()->route('home');
    }

    public function deleteSession()
    {
        Session::forget('idMeja');
        return view('pages.user.index');
    }

    public function viewCart()
    {
        return view('pages.user.cart');
    }

    public function cartStore($id)
    {
        $menu = Menu::find($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['jumlah']++;
        } else {
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

    public function cartUpdate(Request $request)
    {
        $cart = $request->session()->get('cart');

        $ids = $request->input('id');
        $quantities = $request->input('jumlah');

        if ($cart) {
            foreach ($ids as $index => $id) {
                if (isset($cart[$id])) {
                    $cart[$id]['jumlah'] = $quantities[$index];
                }
            }

            $request->session()->put('cart', $cart);
        }



        // if(isset($cart[$id])) {
        //     $cart[$id]['jumlah'] = $request->input('jumlah');
        //     $request->session()->put('cart', $cart);
        // }

        return redirect()->back();
    }

    public function cartDelete(Request $request, $id)
    {

        $request->session()->forget('cart.' . $id);

        return redirect()->back();
    }

    public function cartCheckout(Request $request)
    {
        $cart = $request->session()->get('cart');
        $idMeja = $request->session()->get('idMeja');


        if ($idMeja == null || $idMeja == '') {
            return redirect()->back()->withErrors([
                'NoMeja' => 'No Meja Tidak Ditemukan, Silahkan Scan Ulang Barcode!!',
            ]);
        }

        if ($cart) {
            $noPesanan = 'INV-' . date('Ymd') . '-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
            $tanggalOrder = date('Y-m-d');
            $total = 0;

            foreach ($cart as $item) {
                $total += $item['jumlah'] * $item['harga'];
            }

            $items = [];

            foreach ($cart as $item) {
                $items[] = [
                    'menu' => $item['nama'],
                    'jumlah' => $item['jumlah'],
                    'harga' => $item['harga'],
                ];
            }

            $data = [
                'noPesanan' => $noPesanan,
                'items' => $items,
                'tanggal' => $tanggalOrder,
                'nomor_meja' => $idMeja,
                'total' => $total,
            ];

            $pdf = FacadePdf::loadView('pages.invoice', $data);



            Transaksi::create([
                'no_pesanan' => $noPesanan,
                'tgl_order' => $tanggalOrder,
                'total_bayar' => $total,
            ]);

            foreach ($cart as $item) {
                DetailTransaksi::create([
                    'no_psn' => $noPesanan,
                    'id_menu' => $item['id'],
                    'qty' => $item['jumlah'],
                    'meja' => $idMeja,
                    'status_pesanan' => 'proses',
                ]);
            }

            // return $pdf->download('bukti_invoice.pdf');
            $filename = 'bukti_invoice' . time() . '.pdf';
            $directoryPath = 'public/uploads/struk/';
            if (!Storage::exists($directoryPath)) {
                Storage::makeDirectory($directoryPath, 0775, true, true);
            }
            $path = $directoryPath . $filename;
            Storage::put($path, $pdf->output());

            $response = response()->streamDownload(function () use ($pdf) {
                echo $pdf->output();
            }, 'bukti_invoice.pdf');

            Storage::delete($path);

            $request->session()->forget('cart');
            $request->session()->forget('idMeja');

            header('Refresh: 1;url=' . url()->previous());
            return $response;
        }
        return redirect()->back();
    }
}

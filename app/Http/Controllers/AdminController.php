<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
   public function index(){

    return view('pages.admin.index');
   }

   public function show()
   {
      $data = Menu::get();
      $Kategori = Kategori::get();
      return view('pages.admin.table', ['Menu' => $data, 'Kategori' => $Kategori]);
   }

   public function create()
   {
      $data = Menu::all();
      return view('pages.admin.table');
   }


   public function store(Request $request)
   {
      // $request->validate(
      //    [
      //       'gambar' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
      //    ],
      //    [
      //       'gambar.required' => 'File Tidak Boleh Kosong',
      //       'gambar.max' => 'File Tidak Boleh Lebih Dari 2MB',
      //       'gambar.mimes' => 'Format File Harus JPG,PNG,PDF',
      //    ]
      // );
      if ($request->hasFile('gambar')) {
         $path = $request->file('gambar')->store('uploads/menu');
      } else {
         $path = 'gambar kosong bang';
      }
      // dd($path);
      Menu::create([
         'Menu' => $request->Menu,
         'gambar' => $path,
         'kategori' => $request->kategori,
         'harga' => $request->harga,

      ]);


      return redirect('table');
   }

   public function edit(Request $request, $id)
   {
      $data = Menu::find($id);


      $data->Menu = $request->Menu;
      $data->kategori = $request->kategori;
      $data->harga = $request->harga;
      $data->save();
      return redirect()->route('table');
   }

   // public function update(Request $request)
   // {
   //    $id = $request->id;
   //    $data = Menu::find($id);


   //    $data->Menu = $request->Menu;
   //    $data->kategori = $request->kategori;
   //    $data->harga = $request->harga;
   //    $data->save();
   //    return redirect()->route('table');
   // }


   public function destroy($id)
   {
      $data = Menu::find($id);
      $pathFile = $data->gambar;
      if ($pathFile != null || $pathFile != '') {      
           Storage::delete($pathFile);
       }
     

      $data->delete();
      return redirect()->route('table')->with('sucess', 'data berhasil dihapus');
   }

   public function addKategori(Request $request){
      $kate = new Kategori();
      $kate->kategori = $request->kategori;
      $kate->save();

      return redirect('table');
   }

   public function editKategori(Request $request){
      $id = $request->idKategori;
      $kate = Kategori::find($id);
      $kate->kategori = $request->kategori;
      $kate->save();

      return redirect('table');
   }

   public function deleteKategori($id)
   {
      $data = Kategori::find($id);
      $data->delete();
      return redirect()->route('table')->with('sucess', 'data berhasil dihapus');
   }
}

<?php

namespace App\Http\Controllers;

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
      return view('pages.admin.table', ['Menu' => $data]);
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


      return redirect('admin');
   }

   public function edit(Request $request, $id)
   {
      $data = Menu::find($id);


      $data->Menu = $request->Menu;
      $data->kategori = $request->kategori;
      $data->harga = $request->harga;
      $data->save();
      return redirect()->route('admin');
   }

   public function update(Request $request)
   {
      $id = $request->id;
      $data = Menu::find($id);


      $data->Menu = $request->Menu;
      $data->kategori = $request->kategori;
      $data->harga = $request->harga;
      $data->save();
      return redirect()->route('admin');
   }


   public function destroy($id)
   {
      $data = Menu::find($id);
      $pathFile = $data->gambar;
      if ($pathFile != null || $pathFile != '') {      
           Storage::delete($pathFile);
       }
     

      $data->delete();
      return redirect()->route('admin')->with('sucess', 'data berhasil dihapus');
   }
}

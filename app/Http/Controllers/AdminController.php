<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Kategori;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminController extends Controller
{
   public function index(){

    return view('pages.admin.index');
   }

   public function generateQrCode(){
    $data = Meja::all();
      return view('pages.admin.generateQrCode')->with(['Meja' => $data]);
   }

   public function addQrCode(Request $request){
    $qrName = $request->qrName;
    $hashedQrName = base64_encode($qrName);
    $decodedHash = base64_decode($hashedQrName);


    if (!Storage::exists('uploads/img')) {
       // Jika tidak ada, maka buat folder "uploads"
       Storage::makeDirectory('uploads/img');
   }
 //   $data = [
 //    'url' => 'https://cb06-2001-448a-706e-20eb-d1df-f990-1f4-f5cd.ngrok-free.app/',
 //    'idMeja' => 1,
 //    ];

 //    $content = json_encode($data);

    $result = QrCode::format('png')->size(300)->margin(1)->generate('https://f931-2001-448a-706e-20eb-f4db-f6c8-b0c9-24d4.ngrok-free.app/id/' . $hashedQrName);
    $customName = $qrName . '-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
    $path = 'uploads/img/' . $customName . '.png';
    Storage::put($path, $result);

    Meja::create([
        'no_meja' =>  $qrName,
        'img_qr' => $path,

     ]);
     return redirect()->back();
    // return view('pages.admin.generateQrCode')->with([
    //    'Qrimg' => $result,
    // ]);
 }

 public function deleteMeja($id){
    $data = Meja::find($id);
    $pathFile = $data->img_qr;

    if ($pathFile != null || $pathFile != '') {      
         Storage::delete($pathFile);
     }

    $data->delete();
    return redirect()->back();
 }

 public function downloadQr(Request $request){
    $image = $request->url;
    $path = public_path("storage/" . $image);

   
    if ($path != null) {
        return response()->download($path);
    } else {
        return abort(404);
    }
 }
   

   public function show(Request $request)
   {
      $keyword = $request->input('search');

      $data = Menu::with('kategori')
                  ->when($keyword, function($query) use ($keyword) {
                      return $query->where('Menu', 'like', "%$keyword%");
                  })
                  ->paginate(10);
      $Kategori = Kategori::get();
      return view('pages.admin.table', ['Menu' => $data, 'Kategori' => $Kategori]);
   }

   public function store(Request $request)
   {
      $request->validate(
         [
            'gambar' => 'required|mimes:jpeg,png,jpg|max:5000',
         ],
         [
            'gambar.required' => 'File Tidak Boleh Kosong', 
            'gambar.max' => 'File Tidak Boleh Lebih Dari 2MB',
            'gambar.mimes' => 'Format File Harus JPG,PNG',
         ]
      );
      if ($request->hasFile('gambar')) {
         $path = $request->file('gambar')->store('uploads/menu');
      } else {
         $path = 'gambar kosong bang';
      }
      // dd($path);
      Menu::create([
         'Menu' => $request->Menu,
         'gambar' => $path,
         'kategori_id' => $request->kategori,
         'harga' => $request->harga,

      ]);


      return redirect('table');
   }

   public function edit(Request $request, $id)
   {
      $data = Menu::find($id);

      $request->validate(
         [
            'gambar' => 'mimes:jpeg,png,jpg,pdf|max:2048',

         ],
         [
            'gambar.max' => 'File Tidak Boleh Lebih Dari 2MB',
            'gambar.mimes' => 'Format File Harus JPG,PNG,PDF',
         ]
      );
      if ($request->hasFile('gambar')) {
         $path = $request->file('gambar')->store('uploads/menu');
 
         $pathFile = $data->gambar;
 
         if ($pathFile != null || $pathFile != '') {
             Storage::delete($pathFile);
         }
      } else {
         $path = $data->gambar;
      }
      if($request->kategori != ''){
         $data->Menu = $request->Menu;
         $data->kategori_id = $request->kategori;
         $data->harga = $request->harga;
         $data->gambar = $path;
         $data->save();
      }
 
    
      return redirect()->route('table');
   }

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
      $kate->name = $request->kategori;
      $kate->save();

      return redirect('table');
   }

   public function editKategori(Request $request){
      $id = $request->idKategori;
      $kate = Kategori::find($id);
      $kate->name = $request->kategori;
      $kate->save();

      return redirect('table');
   }

   public function deleteKategori($id)
   {
      $data = Kategori::find($id);
      $data->delete();
      return redirect()->route('table')->with('sucess', 'data berhasil dihapus');
   }

   public function viewLaporan(){
      return view('pages.admin.laporan');
   }

   public function laporanHarian(Request $request){

      $tanggal = $request->input('tanggal');
      $bulan = $request->input('bulan');
      $tahun = $request->input('tahun');


      $bulanAngka = $bulan;
      $bulanHuruf = '';
  
      switch ($bulanAngka) {
          case 1:
              $bulanHuruf = 'Januari';
              break;
          case 2:
              $bulanHuruf = 'Februari';
              break;
          case 3:
              $bulanHuruf = 'Maret';
              break;
          case 4:
              $bulanHuruf = 'April';
              break;
          case 5:
              $bulanHuruf = 'Mei';
              break;
          case 6:
              $bulanHuruf = 'Juni';
              break;
          case 7:
              $bulanHuruf = 'Juli';
              break;
          case 8:
              $bulanHuruf = 'Agustus';
              break;
          case 9:
              $bulanHuruf = 'September';
              break;
          case 10:
              $bulanHuruf = 'Oktober';
              break;
          case 11:
              $bulanHuruf = 'November';
              break;
          case 12:
              $bulanHuruf = 'Desember';
              break;
      }
  
      if(checkdate($bulan, $tanggal, $tahun)) {
          $tanggalOrder = "$tahun-$bulan-$tanggal";
          
          $pendapatanHarian = Transaksi::whereHas('detailTransaksi', function($query) use ($tanggalOrder) {
              $query->where('tgl_order', $tanggalOrder);
          })->get();
  
          return view('pages.admin.laporanHarian')->with(['pendapatanHarian' => $pendapatanHarian, 'tanggal' => $tanggal, 'bulan' => $bulanHuruf, 'tahun' => $tahun]);
      } else {
          return "Tanggal tidak valid!";
      }
  }
  

  public function laporanBulanan(Request $request){

   $bulan = $request->input('bulan');
   $tahun = $request->input('tahun');


   $bulanAngka = $bulan;
   $bulanHuruf = '';

   switch ($bulanAngka) {
       case 1:
           $bulanHuruf = 'Januari';
           break;
       case 2:
           $bulanHuruf = 'Februari';
           break;
       case 3:
           $bulanHuruf = 'Maret';
           break;
       case 4:
           $bulanHuruf = 'April';
           break;
       case 5:
           $bulanHuruf = 'Mei';
           break;
       case 6:
           $bulanHuruf = 'Juni';
           break;
       case 7:
           $bulanHuruf = 'Juli';
           break;
       case 8:
           $bulanHuruf = 'Agustus';
           break;
       case 9:
           $bulanHuruf = 'September';
           break;
       case 10:
           $bulanHuruf = 'Oktober';
           break;
       case 11:
           $bulanHuruf = 'November';
           break;
       case 12:
           $bulanHuruf = 'Desember';
           break;
   }

   $bulanOrder = "$tahun-$bulan";
       
   $pendapatanHarian = Transaksi::whereHas('detailTransaksi', function($query) use ($bulanOrder) {
       $query->where('tgl_order', 'LIKE', "$bulanOrder%");
   })->get();

   return view('pages.admin.laporanBulanan')->with(['pendapatanHarian' => $pendapatanHarian, 'bulan' => $bulanHuruf, 'tahun' => $tahun]);
}

   
}

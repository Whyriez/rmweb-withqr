<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $table= 'table_detail_transaksi';
    protected $fillable = ['no_psn', 'id_menu', 'qty', 'meja'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'no_psn', 'no_pesanan');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
    
}

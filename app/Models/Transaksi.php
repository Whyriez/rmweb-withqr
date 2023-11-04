<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table= 'table_transaksi';
    protected $fillable = ['no_pesanan', 'tgl_order', 'total_bayar', 'status_pesanan'];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'no_psn', 'no_pesanan');
    }
    
    
}

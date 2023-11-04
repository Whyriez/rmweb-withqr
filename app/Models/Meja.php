<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;
    protected $table= 'table_qrmeja';
    protected $fillable = ['no_meja', 'img_qr'];


    public function detailMeja() {
        return $this->hasOne(DetailTransaksi::class, 'meja');
    }
}

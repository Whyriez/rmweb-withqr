<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;
    protected $table= 'table_menu';
    protected $fillable = ['Menu', 'gambar', 'kategori_id', 'harga'];


    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}


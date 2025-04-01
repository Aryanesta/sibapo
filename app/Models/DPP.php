<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DPP extends Model
{
    use HasFactory;

    protected $table = 'dinas_periakanan';

    protected $fillable = [
        'pasar', 
        'jenis_bahan_pokok', 
        'kg_harga',
        'tanggal_dibuat'
    ];
}

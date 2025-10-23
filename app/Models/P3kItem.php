<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P3kItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'standar_kotak',
        'satuan',
        'pemakaian_januari',
        'pemakaian_februari',
        'pemakaian_maret',
        'pemakaian_april',
        'pemakaian_mei',
        'pemakaian_juni',
        'pemakaian_juli',
        'pemakaian_agustus',
        'pemakaian_september',
        'pemakaian_oktober',
        'pemakaian_november',
        'pemakaian_desember',
        'stok_akhir',
        'minimal_stok',
        'harus_diadakan'
    ];
}

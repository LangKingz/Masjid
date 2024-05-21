<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keuangan extends Model
{
    use HasFactory;
    protected $table = "keuangan";
    protected $fillable = [
        'tanggal',
        'jenis',
        'sisa_saldo',
        'keterangan'
    ];
}

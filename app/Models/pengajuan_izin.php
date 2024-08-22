<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_izin extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_izin';
    protected $fillable = [
        'email',
        'tgl_izin',
        'status',
        'keterangan',
        'status_approved',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;
    protected $table = 'departemen';
    public $timestamps = false;
    protected $fillable = [
        'kode_dept',
        'nama_dept',
        'updated_at',
    ];
}

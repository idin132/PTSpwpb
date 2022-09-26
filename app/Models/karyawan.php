<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kartu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "karyawan";
    protected $fillable = [
        'id', 'nip','nik','nama','jenis_kelamin','tempat_lahir','tanggal_lahir','telpon','agama','status_nikah','alamat','gologan_id','foto'

    ];
}
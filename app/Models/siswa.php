<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $table = 't_siswa';
    protected $fillable = ['nis','nama','jk','kelas','nohp','alamat'];

}

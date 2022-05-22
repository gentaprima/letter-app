<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelInstance extends Model
{
    use HasFactory;
    protected $table = "instansi";
    protected $fillable = ['nama_instansi','alamat_instansi'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman_detail extends Model
{
    use HasFactory;
    protected $table = 'peminjaman_details';
    protected $fillable = ['peminjaman_id' , 'buku_id'];
}

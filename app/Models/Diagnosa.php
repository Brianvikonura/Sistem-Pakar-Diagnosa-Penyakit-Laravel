<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;

    protected $table = "diagnosa";
    protected $fillable = ['nama_pemilik', 'no_hp', 'alamat', 'penyakit_id', 'presentase'];

    public function Penyakit(){
        return $this->belongsTo(Penyakit::class, 'penyakit_id');
    } 
}

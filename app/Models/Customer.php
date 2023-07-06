<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nombres',
        'ap_paterno',
        'ap_materno',
        'fecha_nacimiento',
    ];
    protected $attributes = [
        'nombres'=>'',
        'ap_paterno'=>'',
        'ap_materno'=>'',
        'fecha_nacimiento'=>'',
        'calle'=>'',
        'numero_exterior'=>'',
        'colonia'=>'',
        'cp'=>'',
        'ciudad'=>'',
        'estado'=>'',
        'telefono'=>'',
        'capacidad'=>0.00,
        'credencial1'=>'',
        'credencial2'=>'',
        'baja'=>'',
    ];
    protected $table = 'customers';
    protected $primaryKey='id';
}

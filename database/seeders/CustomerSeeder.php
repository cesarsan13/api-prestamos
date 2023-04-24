<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')
        ->insert([ 
            'nombres' => 'Martha Mireya',
            'ap_paterno'=>'Esquivel',
            'ap_materno'=>'Monreal',
            'fecha_nacimiento'=>'1998/10/21',
            'calle'=>'Av. Octava',
            'numero_exterior'=>'165',
            'colonia'=>'Eduardo Guerra',
            'cp'=>'27280',
            'ciudad'=>'torreon',
            'estado'=>'coahuila',
            'telefono'=>'8715342003',
            'capacidad'=>'1000',
            'credencial1'=>'',
            'credencial2'=>'',
            'baja'=>''
        ]);
        DB::table('customers')
        ->insert([ 
            'nombres' => 'Cesar Omar',
            'ap_paterno'=>'Sanchez',
            'ap_materno'=>'Tapia',
            'fecha_nacimiento'=>'1996/04/13',
            'calle'=>'Av. Octava',
            'numero_exterior'=>'165',
            'colonia'=>'Eduardo Guerra',
            'cp'=>'27280',
            'ciudad'=>'Torreon',
            'estado'=>'Coahuila',
            'telefono'=>'8714521184',
            'capacidad'=>'1000',
            'credencial1'=>'',
            'credencial2'=>'',
            'baja'=>''
        ]);
    }
}

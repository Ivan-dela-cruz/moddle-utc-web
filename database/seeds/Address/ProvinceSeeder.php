<?php

use App\Address\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::create([
            'name_province' => 'AZUAY', //1
        ]);
        Province::create([
            'name_province' => 'BOLÍVAR', //2
        ]);
        Province::create([
            'name_province' => 'CAÑAR', //3
        ]);
        Province::create([
            'name_province' => 'CARCHI', //4
        ]);
        Province::create([
            'name_province' => 'COTOPAXI', //5
        ]);
        Province::create([
            'name_province' => 'CHIMBORAZO ', //6
        ]);
        Province::create([
            'name_province' => 'EL ORO', //7
        ]);
        Province::create([
            'name_province' => 'ESMERALDAS', //8
        ]);
        Province::create([
            'name_province' => 'GUAYAS', //9
        ]);
        Province::create([
            'name_province' => 'IMBABURA', //10
        ]);
        Province::create([
            'name_province' => 'LOJA', //11
        ]);
        Province::create([
            'name_province' => 'LOS RIOS', //12
        ]);
        Province::create([
            'name_province' => 'MANABI', //13
        ]);
        Province::create([
            'name_province' => 'MORONA SANTIAGO', //14
        ]);
        Province::create([
            'name_province' => 'NAPO', //15
        ]);
        Province::create([
            'name_province' => 'PASTAZA', //16
        ]);
        Province::create([
            'name_province' => 'PICHINCHA', //17
        ]);
        Province::create([
            'name_province' => 'TUNGURAHUA', //18
        ]);
        Province::create([
            'name_province' => 'ZAMORA CHINCHIPE', //19
        ]);
        Province::create([
            'name_province' => 'GALAPAGOS', //20
        ]);
        Province::create([
            'name_province' => 'SUCUMBIOS', //21
        ]);
        Province::create([
            'name_province' => 'ORELLANA', //22
        ]);
        Province::create([
            'name_province' => 'SANTO DOMINGO DE LOS TSACHILAS', //23
        ]);
        Province::create([
            'name_province' => 'SANTA ELENA', //24
        ]);
    }
}

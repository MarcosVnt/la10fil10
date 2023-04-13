<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\country;
use App\Models\Letraq;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         //\App\Models\Country::create();
         //\App\Models\User::create();


         \App\Models\User::factory()->create([
            'email' => 'marcos@marcos.es',
            'name' => 'marcos',
            'password' => bcrypt('12345678')
        ]);

      
      
        $country = country::create(['code' => 'ES','name' => 'España']);

        $country = country::create(['code' => 'FR','name' => 'Francia']);
        $country = country::create(['code' => 'PT','name' => 'Portugal']);

        $letraq =  Letraq::create(['letraq' => '001234546789','tipo'=>'industria']);
        $letraq =  Letraq::create(['letraq' => '002222222222','tipo'=>'vehiculo']);
        $letraq =  Letraq::create(['letraq' => '003333333333','tipo'=>'remolque']);
        


        \App\Models\Dni::create([
            'dni' => '09780381E',
            'nombre' => 'nombre',
            'direccion1' => 'direccion1',
            'direccion2' => 'direccion2',
            'localidad' => 'leon',
            'municipio' => 'leon',
            'provincia' => 'provincia',
            'codigo_postal' => '24001',
            'country_id' => '1'
        ]);

        \App\Models\Empresa::create([
            'dni_id' => '1',
            'nombre' => 'nombre',
            'direccion1' => 'direccion1',
            'direccion2' => 'direccion2',
            'localidad' => 'leon',
            'municipio' => 'leon',
            'provincia' => 'provincia',
            'codigo_postal' => '24001',
            
        ]);


        //$adminUser->assignRole($adminRole);
         

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

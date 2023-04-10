<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            ['code' => 'AR-B', 'name' => 'Buenos Aires'],
            ['code' => 'AR-K', 'name' => 'Catamarca'],
            ['code' => 'AR-H', 'name' => 'Chaco'],
            ['code' => 'AR-U', 'name' => 'Chubut'],
            ['code' => 'AR-C', 'name' => 'Ciudad Autónoma de Buenos Aires'],
            ['code' => 'AR-X', 'name' => 'Cordoba'],
            ['code' => 'AR-W', 'name' => 'Corrientes'],
            ['code' => 'AR-E', 'name' => 'Entre Rios'],
            ['code' => 'AR-P', 'name' => 'Formosa'],
            ['code' => 'AR-Y', 'name' => 'Jujuy'],
            ['code' => 'AR-L', 'name' => 'La Pampa'],
            ['code' => 'AR-F', 'name' => 'La Rioja'],
            ['code' => 'AR-M', 'name' => 'Mendoza'],
            ['code' => 'AR-N', 'name' => 'Misiones'],
            ['code' => 'AR-Q', 'name' => 'Neuquén'],
            ['code' => 'AR-R', 'name' => 'Rio Negro'],
            ['code' => 'AR-A', 'name' => 'Salta'],
            ['code' => 'AR-J', 'name' => 'San Juan'],
            ['code' => 'AR-D', 'name' => 'San Luis'],
            ['code' => 'AR-Z', 'name' => 'Santa Cruz'],
            ['code' => 'AR-S', 'name' => 'Santa Fe'],
            ['code' => 'AR-G', 'name' => 'Santiago del Estero'],
            ['code' => 'AR-V', 'name' => 'Tierra Del Fuego'],
            ['code' => 'AR-T', 'name' => 'Tucumán'],
        ];

        foreach ($provinces as $province) {
            Province::create([
                'code' => $province['code'],
                'name' => $province['name'],
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\DocType;
use App\Models\IvaType;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doc_types = [
            ['code' => '00', 'descrip' => 'CI Policia Federal'],
            ['code' => '01', 'descrip' => 'CI Buenos Aires'],
            ['code' => '02', 'descrip' => 'CI Catamarca'],
            ['code' => '03', 'descrip' => 'CI Cordoba'],
            ['code' => '04', 'descrip' => 'CI Corrientes'],
            ['code' => '05', 'descrip' => 'CI Entre Rios'],
            ['code' => '06', 'descrip' => 'CI Jujuy'],
            ['code' => '07', 'descrip' => 'CI Mendoza'],
            ['code' => '08', 'descrip' => 'CI La Rioja'],
            ['code' => '09', 'descrip' => 'CI Salta'],
            ['code' => '10', 'descrip' => 'CI San Juan'],
            ['code' => '11', 'descrip' => 'CI San Luis'],
            ['code' => '12', 'descrip' => 'CI Santa Fe'],
            ['code' => '13', 'descrip' => 'CI Santiago del Estero'],
            ['code' => '14', 'descrip' => 'CI Tucuman'],
            ['code' => '16', 'descrip' => 'CI Chaco'],
            ['code' => '17', 'descrip' => 'CI Chubut'],
            ['code' => '18', 'descrip' => 'CI Formosa'],
            ['code' => '19', 'descrip' => 'CI Misiones'],
            ['code' => '20', 'descrip' => 'CI Neuquen'],
            ['code' => '21', 'descrip' => 'CI La Pampa'],
            ['code' => '22', 'descrip' => 'CI Rio Negro'],
            ['code' => '23', 'descrip' => 'CI Santa Cruz'],
            ['code' => '24', 'descrip' => 'CI Tierra del Fuego'],
            ['code' => '80', 'descrip' => 'CUIT'],
            ['code' => '86', 'descrip' => 'CUIL'],
            ['code' => '87', 'descrip' => 'CDI'],
            ['code' => '89', 'descrip' => 'LE'],
            ['code' => '90', 'descrip' => 'LC'],
            ['code' => '91', 'descrip' => 'CI Extranjera'],
            ['code' => '92', 'descrip' => 'En tramite'],
            ['code' => '93', 'descrip' => 'Acta Nacimiento'],
            ['code' => '94', 'descrip' => 'Pasaporte'],
            ['code' => '95', 'descrip' => 'CI Bs. As. RNP'],
            ['code' => '96', 'descrip' => 'DNI'],
            ['code' => '99', 'descrip' => 'Doc. (otro)'],
        ];

        $iva_types = [
            ['code' => '01', 'descrip' => 'IVA Responsable Inscripto'],
            ['code' => '02', 'descrip' => 'IVA Responsable no Inscripto'],
            ['code' => '03', 'descrip' => 'IVA no Responsable'],
            ['code' => '04', 'descrip' => 'IVA Sujeto Exento'],
            ['code' => '05', 'descrip' => 'Consumidor Final'],
            ['code' => '06', 'descrip' => 'Responsable Monotributo'],
            ['code' => '07', 'descrip' => 'Sujeto no Categorizado'],
            ['code' => '08', 'descrip' => 'Proveedor del Exterior'],
            ['code' => '09', 'descrip' => 'Cliente del Exterior'],
            ['code' => '10', 'descrip' => 'IVA Liberado - Ley No 19.640'],
            ['code' => '11', 'descrip' => 'IVA Resp.Insc.-Agente Percep.'],
            ['code' => '12', 'descrip' => 'Pequeno Contribuyente Eventual'],
            ['code' => '13', 'descrip' => 'Monotributista Social'],
            ['code' => '14', 'descrip' => 'Pequeno Contrib.Event.Social'],
        ];

        foreach ($doc_types as $doc_type) {
            DocType::create([
                'code' => $doc_type['code'],
                'descrip' => $doc_type['descrip'],
            ]);
        }

        foreach ($iva_types as $iva_type) {
            IvaType::create([
                'code' => $iva_type['code'],
                'descrip' => $iva_type['descrip'],
            ]);
        }
    }
}

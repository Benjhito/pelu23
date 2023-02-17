<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClientsExport implements FromCollection, WithMapping, WithHeadings
    {
        /**
        * @return \Illuminate\Support\Collection
        */
        public function collection()
        {
            //return Client::all();
            $search = session()->get('search-1');

            return Client::businessName($search)
                ->orWhere->email($search)
                ->orWhere->code($search)
                ->orderBy(session()->get('sort-1'), session()->get('direction-1'))
                ->get();
        }

        public function map($client): array
        {
            return [
                $client->code,
                $client->business_name,
                $client->address,
                $client->postcode,
                $client->locality,
                $client->mobile,
                $client->phone,
                $client->email,
                $client->docType->descrip,
                $client->cuit,
                $client->ivaType->descrip,
                $client->inv_type,
                $client->status,
            ];
        }

        public function headings(): array
        {
            return [
                'Cód.Int.',
                'Razón Social',
                'Domicilio',
                'C.P.',
                'Localidad',
                'Móvil',
                'Fijo',
                'Email',
                'Tipo Doc.',
                'Nro Doc.',
                'Tipo IVA',
                'Tipo Fact.',
                'Estado',
            ];
        }
    }

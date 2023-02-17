<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Client;
use App\Models\DocType;
use App\Models\IvaType;
use App\Exports\ClientsExport;
use App\Exports\ClientsListPdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CreateClientRequest;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastRecord = Client::orderBy('code', 'desc')->first(); //latest()->first();
        $client = new Client;
        $client->code = $lastRecord ? (string)(((int)$lastRecord->code) + 1) : '1001';
        $client->doc_type_id = 35;
        $client->iva_type_id = 5;
        $client->inv_type = 'B';
        $client->status = 'A';
        $docTypes = DocType::all();
        $ivaTypes = IvaType::all();
        $title = 'Nuevo Cliente';
        $textButton = 'Crear';
        $route = route('clients.store');

        return view('clients.create', compact('title', 'textButton', 'route', 'client', 'docTypes', 'ivaTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
        Client::create($request->validated());

        return redirect()->route('clients.index')->with('success', '¡El Cliente fue dado de alta exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $docTypes = DocType::all();
        $ivaTypes = IvaType::all();
        $update = true;
        $title = 'Editar Cliente';
        $textButton = 'Actualizar';
        $route = route('clients.update', ['client' => $client]);

        return view('clients.edit', compact('update', 'title', 'textButton', 'route', 'client', 'docTypes', 'ivaTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateClientRequest $request, Client $client)
    {
        //$client->fill($request->all())->save();
        $client->update($request->validated());

        return redirect()->route('clients.index')->with('success', '¡Cliente actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        try {
            $client->delete();
        } catch (Throwable $e) {
            //report($e);
            return back()->withErrors('No se puede eliminar este Cliente porque hay Registros asociados al mismo.');
        }

        return redirect()->route('clients.index')->withSuccess('¡El Cliente fue eliminado de la Base de Datos!');
    }

    public function list(ClientsListPdf $pdf)
    {
        $title = 'Listado de Clientes';
        //$pdf = new ClientsListPdf();
        $pdf->AliasNbPages();
        $pdf->SetMargins(12, 20);
        $pdf->AddPage('L', 'A4');
        $pdf->SetTitle($title);
        $pdf->SetAuthor('Benjamin E. Tito');
        $pdf->SetCreator('Benjamin E. Tito');
        $pdf->SetSubject($title);

        $search = session()->get('search-1');

        $clients = Client::businessName($search)
            ->orWhere->email($search)
            ->orWhere->code($search)
            ->orderBy(session()->get('sort-1'), session()->get('direction-1'))
            ->get();

        // Header
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(10, 7, 'Cod.', 1, 0, 'C');
        $pdf->Cell(50, 7, 'Razon Social', 1, 0, 'C');
        $pdf->Cell(60, 7, 'Domicilio', 1, 0, 'C');
        $pdf->Cell(34, 7, 'Localidad', 1, 0, 'C');
        $pdf->Cell(10, 7, 'C.P.', 1, 0, 'C');
        $pdf->Cell(20, 7, 'Movil', 1, 0, 'C');
        $pdf->Cell(17, 7, 'Fijo', 1, 0, 'C');
        $pdf->Cell(16, 7, 'TipoDoc', 1, 0, 'C');
        $pdf->Cell(17, 7, 'CUIT', 1, 0, 'C');
        $pdf->Cell(28, 7, 'Tipo IVA', 1, 0, 'C');
        $pdf->Cell(13, 7, 'TipoFac', 1, 0, 'C');
        $pdf->Ln();
        // Data
        foreach ($clients as $client) {
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(10, 6, $client->code, 1, 0, 'C');
            $pdf->Cell(50, 6, utf8_decode(substr($client->business_name, 0, 25)), 1);
            $pdf->Cell(60, 6, utf8_decode(substr($client->address, 0, 32)), 1);
            $pdf->Cell(34, 6, utf8_decode(substr($client->locality, 0, 17)), 1);
            $pdf->Cell(10, 6, substr($client->postcode, 0, 4), 1, 0, 'C');
            $pdf->Cell(20, 6, substr($client->mobile, 0, 10), 1, 0, 'C');
            $pdf->Cell(17, 6, substr($client->phone, 0, 8), 1, 0, 'C');
            $pdf->Cell(16, 6, substr($client->docType->descrip, 0, 10), 1);
            $pdf->Cell(17, 6, $client->cuit, 1, 0, 'C');
            $pdf->Cell(28, 6, substr($client->ivaType->descrip, 0, 16), 1);
            $pdf->Cell(13, 6, $client->inv_type, 1, 0, 'C');
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Ln();
        }

        return response($pdf->output('S'), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-disposition', 'filename=ListadoClientes(' . now()->format('d-m-Y') . ').pdf');
    }

    public function export(ClientsExport $clientsExport)
    {
        return Excel::download($clientsExport, 'Clientes(' . now()->format('d-m-Y') . ').xlsx');
    }
}

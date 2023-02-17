<div class="web2py_grid">
    <center><h5><strong>Clientes | Gestión de Clientes</strong></h5></center>
    <div class="web2py_console mt-3">
      <div class="d-flex">
          <a class="button btn btn-primary text-white mr-3" href="{{ route('clients.create') }}" title="Agrega un nuevo Cliente a la base de datos">Agregar Cliente</a>

          <input wire:model="search" type="text" name="search" class="form-control" placeholder="Buscar por Nombre o Email..." />

          <select wire:model="perPage" class="form-control text-secondary" style="width: 5%; height: 30px;font-size: 0.875rem;">
              <option value="5">5/pag</option>
              <option value="10">10/pag</option>
              <option value="15">15/pag</option>
              <option value="25">25/pag</option>
              <option value="50">50/pag</option>
              <option value="100">100/pag</option>
          </select>

          @if($search !== '')
              <button wire:click="clear" class="rounded p-1" title="Limpia el filtro">
                  <img class="w-75" src="{{ asset('images/icons8-cancelar-gray.svg') }}" alt="x">
              </button>
          @endif

          @if($clients->count())
              <a class="button btn btn-warning text-white ml-3" target="_blank" rel="noopener noreferrer" href="{{ route('clients.list') }}" title="Listado de Clientes en formato PDF">Listado pdf</a>

              <a class="button btn btn-success ml-3" href="{{ route('clients.export') }}" title="Listado de Clientes en formato XLS">Listado xls</a>
          @endif
      </div>
      <div class="web2py_counter text-secondary">Cantidad de Clientes: {{ $clients->total() }}</div>
      <div class="table-responsive">
        <table class="table table-condensed table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th wire:click="order('code')" style="text-align:center" role="button">Cód.</th>
              <th wire:click="order('business_name')" style="text-align:center" role="button">Razón Social</th>
              <th wire:click="order('address')" style="text-align:center" role="button">Domicilio</th>
              <th wire:click="order('postcode')" style="text-align:center" role="button">C.P.</th>
              <th wire:click="order('locality')" style="text-align:center" role="button">Localidad</th>
              <th wire:click="order('mobile')" style="text-align:center" role="button">Móvil</th>
              <th wire:click="order('phone')" style="text-align:center" role="button">Fijo</th>
              <th wire:click="order('email')" style="text-align:center" role="button">Email</th>
              <th wire:click="order('doc_type_id')" style="text-align:center" role="button">TipoDoc.</th>
              <th wire:click="order('cuit')" style="text-align:center" role="button">Nro.Doc.</th>
              <th wire:click="order('iva_type_id')" style="text-align:center" role="button">Tipo IVA</th>
              <th wire:click="order('inv_type')" style="text-align:center" role="button">Tipo Fact.</th>
              <th wire:click="order('status')" style="text-align:center" role="button">Estado</th>
              <th style="text-align:center">Eliminar</th>
            </tr>
          </thead>
          <tbody>
            @forelse($clients as $client)
              <tr>
                <td align="center">
                  <a href="{{ route('clients.edit', ['client' => $client]) }}" title="Modifica datos del Cliente">
                    {{ $client->code }}
                  </a>
                </td>
                <td nowrap="nowrap">{{ $client->business_name }}</td>
                <td nowrap="nowrap">{{ $client->address }}</td>
                <td align="center">{{ $client->postcode }}</td>
                <td nowrap="nowrap">{{ $client->locality }}</td>
                <td align="center">{{ $client->mobile }}</td>
                <td align="center">{{ $client->phone }}</td>
                <td>{{ $client->email }}</td>
                <td nowrap="nowrap">{{ $client->docType->descrip }}</td>
                <td align="center">{{ $client->cuit }}</td>
                <td nowrap="nowrap">{{ $client->ivaType->descrip }}</td>
                <td align="center">{{ $client->inv_type }}</td>
                <td align="center">{{ $client->status }}</td>
                <td align="center">
                  <a href="#" type="button" class="" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $client->id }}" title="Elimina todos los datos del Cliente">
                      <img src="{{ asset('images/icons8-basura-rojo.svg') }}" alt="Eliminar" class="w-50">
                  </a>
                  @include('livewire.clients.modal')
                </td>
              </tr>
            @empty
              @include("livewire.empty")
            @endforelse
          </tbody>
        </table>
        @if($clients->count())
          {{ $clients->links('livewire.pagination') }}
        @endif
      </div>
    </div>
</div>

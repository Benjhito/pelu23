<div class="web2py_grid">
    <center><h5><strong>Proveedores | Gestión de Proveedores</strong></h5></center>
    <div class="web2py_console mt-3">
      <div class="d-flex">
          <a class="button btn btn-primary text-white mr-3" href="{{ route('providers.create') }}" title="Agrega un nuevo Cliente a la base de datos">Agregar Proveedor</a>

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

          @if($providers->count())
              <a class="button btn btn-warning text-white ml-3" target="_blank" rel="noopener noreferrer" href="{{ route('providers.list') }}" title="Listado de Clientes en formato PDF">Listado pdf</a>

              <a class="button btn btn-success ml-3" href="{{ route('providers.export') }}" title="Listado de Clientes en formato XLS">Listado xls</a>
          @endif
      </div>
      <div class="web2py_counter text-secondary">Cantidad de Proveedores: {{ $providers->total() }}</div>
      <div class="table-responsive">
        <table class="table table-condensed table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th wire:click="order('code')" style="text-align:center" role="button">Cód.</th>
              <th wire:click="order('business_name')" style="text-align:center" role="button">Razón Social</th>
              <th wire:click="order('address')" style="text-align:center" role="button">Domicilio</th>
              <th wire:click="order('postcode')" style="text-align:center" role="button">C.P.</th>
              <th wire:click="order('locality')" style="text-align:center" role="button">Localidad</th>
              <th wire:click="order('province_id')" style="text-align:center" role="button">Provincia</th>
              <th wire:click="order('country')" style="tetx-align:center" role="button">País</th>
              <th wire:click="order('phone1')" style="text-align:center" role="button">Teléfono 1</th>
              <th wire:click="order('phone2')" style="text-align:center" role="button">Teléfono 2</th>
              <th wire:click="order('email')" style="text-align:center" role="button">Email</th>
              <th wire:click="order('acc_type')" style="text-align:center" role="button">Tipo Cta.</th>
              <th wire:click="order('acc_number')" style="text-align:center" role="button">Nro.Cta.</th>
              <th wire:click="order('cuit')" style="text-align:center" role="button">Nro.Doc.</th>
              <th wire:click="order('iva_type_id')" style="text-align:center" role="button">Tipo IVA</th>
              <th wire:click="order('inv_type')" style="text-align:center" role="button">Tipo Fact.</th>
              <th wire:click="order('contact')" style="text-align:center" role="button">Contacto</th>
              <th style="text-align:center">Eliminar</th>
            </tr>
          </thead>
          <tbody>
            @forelse($providers as $provider)
              <tr>
                <td align="center">
                  <a href="{{ route('providers.edit', ['provider' => $provider]) }}" title="Modifica datos del Proveedor">
                    {{ $provider->code }}
                  </a>
                </td>
                <td nowrap="nowrap">{{ $provider->business_name }}</td>
                <td nowrap="nowrap">{{ $provider->address }}</td>
                <td align="center">{{ $provider->postcode }}</td>
                <td nowrap="nowrap">{{ $provider->locality }}</td>
                <td nowrap="nowrap">{{ $provider->province->name }}</td>
                <td nowrap="nowrap">{{ $provider->country }}</td>
                <td align="center">{{ $provider->phone1 }}</td>
                <td align="center">{{ $provider->phone2 }}</td>
                <td>{{ $provider->email }}</td>
                <td nowrap="nowrap">{{ $provider->acc_type }}</td>
                <td align="center">{{ $provider->acc_number }}</td>
                <td align="center">{{ $provider->cuit }}</td>
                <td nowrap="nowrap">{{ $provider->ivaType->descrip }}</td>
                <td align="center">{{ $provider->inv_type }}</td>
                <td nowrap="nowrap">{{ $provider->contact }}</td>
                <td align="center">
                  <a href="#" type="button" class="" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $client->id }}" title="Elimina todos los datos del Cliente">
                      <img src="{{ asset('images/icons8-basura-rojo.svg') }}" alt="Eliminar" class="w-50">
                  </a>
                  @include('livewire.providers.modal')
                </td>
              </tr>
            @empty
              @include("livewire.empty")
            @endforelse
          </tbody>
        </table>
        @if($providers->count())
          {{ $providers->links('livewire.pagination') }}
        @endif
      </div>
    </div>
  </div>

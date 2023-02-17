<div class="d-flex justify-content-center">
    <form class="w-50 bg-light border border-dark rounded p-4 mb-3 mx-5" method="POST" action="{{ $route }}">
      @csrf
      @isset($update)
          @method("PUT")
      @endisset

      <h5 class="text-center">
          <strong>{{ $title }}</strong>
      </h5>

      <div class="form-row">
        <div class="form-group col-12 col-md-2">
          <label class="col-form-label text-secondary" for="code" id="code__label"><b>Cód.Int.</b></label>
          <input class="string form-control" id="code" name="code" type="text" value="{{ $client->code }}" readonly="on" />
        </div>

        <div class="form-group col-12 col-md-10">
          <label class="col-form-label text-secondary" for="business_name" id="business_name__label"><b>Razón Social</b></label>
          <input class="string form-control" id="business_name" name="business_name" type="text" value="{{ old('business_name') ?? $client->business_name }}" maxlength="40" autofocus="on" />
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-12">
          <label class="col-form-label text-secondary" for="address" id="address__label"><b>Domicilio</b></label>
          <input class="string form-control" id="address" name="address" type="text" value="{{ old('address') ?? $client->address }}" maxlength="50" />
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-12 col-md-2">
          <label class="col-form-label text-secondary" for="postcode" id="postcode__label"><b>Cód.Postal</b></label>
          <input class="string form-control" id="postcode" name="postcode" type="text" value="{{ old('postcode') ?? $client->postcode }}" maxlength="8" />
        </div>

        <div class="form-group col-12 col-md-10">
          <label class="col-form-label text-secondary" for="locality" id="locality__label"><b>Localidad</b></label>
          <input class="string form-control" id="locality" name="locality" type="text" value="{{ old('locality') ?? $client->locality }}" maxlength="40" />
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-12 col-md-6">
          <label class="col-form-label text-secondary" for="mobile" id="mobile__label"><b>Móvil</b></label>
          <input class="string form-control" id="mobile" name="mobile" type="text" value="{{ old('mobile') ?? $client->mobile }}" />
        </div>

        <div class="form-group col-12 col-md-6">
          <label class="col-form-label text-secondary" for="phone" id="phone__label"><b>Fijo</b></label>
          <input class="string form-control" id="phone" name="phone" type="text" value="{{ old('phone') ?? $client->phone }}" />
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-12">
          <label class="col-form-label text-secondary" for="email" id="email__label"><b>Email</b></label>
          <input class="string form-control" id="email" name="email" type="email" value="{{ old('email') ?? $client->email }}" />
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-12 col-md-6">
          <label class="col-form-label text-secondary" for="doc_type_id" id="doc_type_id__label"><b>Tipo de Documento</b></label>
          <select class="form-control generic-widget" id="doc_type_id" name="doc_type_id">
              <option disabled selected value="">- Seleccione -</option>
              @foreach($docTypes as $docType)
                  <option value="{{ $docType->id }}" {{ (old('doc_type_id') ?? $client->doc_type_id) == $docType->id ? 'selected' : '' }}>{{ $docType->descrip }}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group col-12 col-md-6">
          <label class="col-form-label text-secondary" for="cuit" id="cuit__label"><b>Nro. de Documento</b></label>
          <input class="string form-control" id="cuit" name="cuit" type="text" value="{{ old('cuit') ?? $client->cuit }}" />
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-12 col-md-6">
          <label class="col-form-label text-secondary" for="iva_type_id" id="iva_type_id__label"><b>Tipo de IVA</b></label>
          <select class="form-control generic-widget" id="iva_type_id" name="iva_type_id">
              <option disabled selected value="">- Seleccione -</option>
              @foreach($ivaTypes as $ivaType)
                  <option value="{{ $ivaType->id }}" {{ (old('iva_type_id') ?? $client->iva_type_id) == $ivaType->id ? 'selected' : '' }}>{{ $ivaType->descrip }}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group col-12 col-md-2">
          <label class="col-form-label text-secondary" for="inv_type" id="inv_type__label"><b>Tipo Fact.</b></label>
          <select class="form-control generic-widget" id="inv_type" name="inv_type">
              <!--option disabled selected value="">Seleccione</option-->
              <option value="B" {{ (old('inv_type') ?? $client->inv_type) == 'B' ? 'selected' : '' }}>B</option>
              <option value="A" {{ (old('inv_type') ?? $client->inv_type) == 'A' ? 'selected' : '' }}>A</option>
              <option value="M" {{ (old('inv_type') ?? $client->inv_type) == 'M' ? 'selected' : '' }}>M</option>
          </select>
        </div>

        <div class="form-group col-12 col-md-4">
          <label class="col-form-label text-secondary" for="status" id="status__label"><b>Estado</b></label>
          <select class="form-control generic-widget" id="status" name="status">
              <!--option disabled selected value="">Seleccione</option-->
              <option value="A" {{ (old('status') ?? $client->status) == 'Activo' ? 'selected' : '' }}>Activo</option>
              <option value="S" {{ (old('status') ?? $client->status) == 'Suspendido' ? 'selected' : '' }}>Suspendido</option>
          </select>
        </div>
      </div>

      <div class='d-flex justify-content-center pt-2'>
        <a class="button btn btn-secondary mr-5" href="{{ route('clients.index') }}" title="Regresa a la página de Clientes">Cancelar</a>
        <input class="btn btn-primary" type="submit" value="{{ $textButton }}" />
      </div>
    </form>
</div>

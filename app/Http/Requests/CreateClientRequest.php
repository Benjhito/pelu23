<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $cond = $this->method()=='PUT';
        $name = $cond ? ',business_name,' . $this->route('client')->id : '';
        $email = $cond ? ',email,' . $this->route('client')->id : '';

        return [
            'code' => ['required', 'max:4'],
            'business_name' => ['required', 'max:40', 'unique:clients' . $name],
            'address' => ['nullable', 'string', 'max:50'],
            'postcode' => ['nullable', 'string', 'max:8'],
            'locality' => ['nullable', 'string', 'max:40'],
            'mobile' => ['nullable', 'string', 'max:14'],
            'phone' => ['nullable', 'string', 'max:14'],
            'email' => ['nullable', 'string', 'max:512', 'unique:clients' . $email],
            'doc_type_id' => ['required', 'exists:doc_types,id'],
            'cuit' => ['nullable', 'string', 'max:13'],
            'iva_type_id' => ['required', 'exists:iva_types,id'],
            'inv_type' => ['required', 'in:A,B,M'],
            'status' => ['required', 'in:A,S'],
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Ingrese el Código del Cliente',
            'code.max' => 'El código es de 4 dígitos',
            'business_name.required' => 'Ingrese el Nombre del Cliente',
            'business_name.max' => 'La longitud máxima del Nombre de Cliente es de 40 caracteres',
            'business_name.unique' => 'El Nombre de Cliente ya existe',
            'address.max' => 'La longitud máxima del Domicilio es de 50 caracteres',
            'postcode.max' => 'La longitud máxima del Código Postal es de 8 caracteres',
            'locality.max' => 'La longitud máxima de la Localidad es de 40 caracteres',
            'mobile.max' => 'La longitud máxima del Tel. Móvil es de 14 dígitos',
            'phone.max' => 'La longitud máxima del Tel. Fijo es de 14 dígitos',
            'email.max' => 'La longitud máxima del Email es de 512 caracteres',
            'email.unique' => 'El Email ya existe',
            'doc_type_id.required' => 'Seleccione el Tipo de Documento',
            'doc_type_id.exists' => 'El Tipo de Documento no existe en la tabla de Tipos de Documento',
            'cuit.max' => 'La longitud máxima del CUIT es de 13 caracteres',
            'iva_type_id.required' => 'Seleccione el Tipo de IVA',
            'iva_type_id.exists' => 'El Tipo de IVA no existe en la tabla de Tipos de IVA',
            'inv_type.max' => 'Ingrese A, B, o M para el Tipo de Factura',
            'inv_type.required' => 'Ingrese el Tipo de Factura',
            'status.required' => 'Ingrese el Estado del Cliente',
        ];
    }
}

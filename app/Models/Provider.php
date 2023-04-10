<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code',
        'fantasy',
        'business_name',
        'address',
        'postcode',
        'locality',
        'province_id',
        'country',
        'phone1',
        'phone2',
        'email',
        'acc_type',
        'acc_number',
        'cuit',
        'iva_type_id',
        'inv_type',
        'contact',
    ];

    public function setBusinessNameAttribute($value)
    {
        $this->attributes['business_name'] = mb_strtoupper($value);
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = mb_strtoupper($value);
    }

    public function setLocalityAttribute($value)
    {
        $this->attributes['locality'] = mb_strtoupper($value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = mb_strtolower($value);
    }

    public function getAccTypeAttribute()
    {
        return ['C' => 'Cuenta Corriente', 'A' => 'Caja de Ahorro'][$this->attributes['acc_type']];
    }

    public function scopeBusinessName($query, $business_name)
    {
        if ($business_name)
            return $query->where('business_name', 'ilike', "%{$business_name}%");
    }

    public function scopeEmail($query, $email)
    {
        if ($email)
            return $query->where('email', 'ilike', "%{$email}%");
    }

    public function scopeCode($query, $code)
    {
        if ($code)
            return $query->where('code', 'ilike', "%{$code}%");
    }

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'province',
        'ivaType',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function ivaType()
    {
        return $this->belongsTo(IvaType::class);
    }
}

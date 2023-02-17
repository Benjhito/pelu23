<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code',
        'business_name',
        'address',
        'postcode',
        'locality',
        'mobile',
        'phone',
        'email',
        'doc_type_id',
        'cuit',
        'iva_type_id',
        'inv_type',
        'status',
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

    public function getStatusAttribute()
    {
        return ['A' => 'Activo', 'S' => 'Suspendido'][$this->attributes['status']];
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
        'docType',
        'ivaType',
    ];

    public function docType()
    {
        return $this->belongsTo(DocType::class);
    }

    public function ivaType()
    {
        return $this->belongsTo(IvaType::class);
    }
}

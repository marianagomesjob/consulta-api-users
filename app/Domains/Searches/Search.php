<?php

namespace App\Domains\Searches;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $fillable = [
        'name',
        'cpf',
        'basic',
        'emails',
        'phones',
        'result',
    ];

    protected $table = 'searches';



    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i');
    }

    public function getBasicAttribute($value)
    {
        return json_decode($value);
    }

    public function getEmailsAttribute($value)
    {
        return json_decode($value);
    }

    public function getPhonesAttribute($value)
    {
        return json_decode($value);
    }
}

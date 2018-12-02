<?php

namespace App\Domains\Searches;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $fillable = [
        'name',
        'cpf',
    ];

    protected $table = 'searches';



    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i');
    }
}

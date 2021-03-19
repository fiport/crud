<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    protected $table = 'schedules';

    protected  $fillable = [
        'input_name',
        'input_number',
        'input_email',
        'input_address',
        'input_cep',
        'input_n',
        'input_city',
        'input_district',
        'input_state',
    ];
}

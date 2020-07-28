<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i:s',
        'updated_at' => 'datetime:d/m/Y H:i:s',
    ];
}

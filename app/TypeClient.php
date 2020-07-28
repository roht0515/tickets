<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeClient extends Model
{
    //
    protected $table = 'type_client';
    protected $fillable = [
        'name','priority_id'
    ];
    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i:s',
        'updated_at' => 'datetime:d/m/Y H:i:s',
    ];
}

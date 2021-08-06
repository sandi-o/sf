<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrawledVessel extends Model
{    
    protected $guarded = [];

    protected $casts = [
        'id' => 'string'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceComponent extends Model
{
    protected $table = "resource_components";
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\ResourceType', 'foreign_key', 'resource_type_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceComponent extends Model
{
    protected $table = "resource_components";
    public $timestamps = false;

    public function resourceType()
    {
        return $this->belongsTo('App\ResourceType', 'resource_type_id');
    }
}

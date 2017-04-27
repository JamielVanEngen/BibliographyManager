<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceType extends Model
{
    protected $table = "resource_types";
    public $timestamps = false;

    public function citationStyle()
    {
        return $this->belongsTo('App\CitationStyle', 'citation_style_id');
    }

    public function resourceComponent()
    {
        return $this->hasMany('App\ResourceComponent', 'resource_type_id');
    }
}

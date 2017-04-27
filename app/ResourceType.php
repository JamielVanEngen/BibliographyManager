<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceType extends Model
{
    protected $table = "resource_types";
    public $timestamps = false;

    public function citationStyle()
    {
        return $this->belongsTo('App\CitationStyle', 'foreign_key', 'citation_style_id');
    }

    public function ResourceComponent()
    {
        return $this->hasMany('App\ResourceComponent', 'foreign_key', 'resource_type_id');
    }
}

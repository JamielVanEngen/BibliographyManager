<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CitationStyle extends Model
{
    protected $table = "citation_styles";
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function resourceType()
    {
        return $this->hasMany('App\ResourceType', 'citation_style_id');
    }
}

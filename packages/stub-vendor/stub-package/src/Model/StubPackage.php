<?php

namespace StubVendor\StubPackage\Models;

use Illuminate\Database\Eloquent\Model;

class StubPackage extends Model
{
    // protected $table = '';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    // protected $dates = [];
    // protected $casts = [];
    // protected $with = [];
    // protected $fillable = [];
    protected $hidden = [];
    protected $appends = [];

    //region Relationships
    //endregion

    //region Scopes
    //endregion

    //region Accessors
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    //endregion

    //region Mutators
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value);
    }
    //endregion
}

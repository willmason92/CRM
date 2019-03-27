<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyActivity extends Model
{
    protected $fillable = [
        'category',
        'permission',
    ];

    protected $guarded = [
        'id'
    ];

    public function companies()
    {
        return $this->hasMany('App\Company');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}

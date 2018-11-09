<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable = ['size', 'customer_name','remark1','remark2','remark3','isActive'];

    public function dots() {
        return $this->hasMany(Dot::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

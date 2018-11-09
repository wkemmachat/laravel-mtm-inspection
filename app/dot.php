<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dot extends Model
{
    protected $fillable = [ 'fg_date','weld_date'
                            ,'bottom','longitudinal'
                            ,'serial_number','top'
                            ,'spud','collar','footring'
                            ,'customer_id' ,'tare_weight' ];


    protected $dates = ['fg_date','weld_date'];

    public function user() {
        return $this->belongsTo(User::class);
    }


    public function user_key_fg() {
        return $this->belongsTo(User::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

}

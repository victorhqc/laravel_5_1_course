<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $table = 'account';
    protected $with = ['user', 'currency'];

    public function user() {
        return $this->belongsTo('\App\User');
    }

    public function currency() {
        return $this->belongsTo('\App\Currency');
    }

    public function getAmountAttribute($value) {
        return (float)$value;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $table = 'movement';

    public function account() {
        return $this->belongsTo('\App\BankAccount');
    }
}

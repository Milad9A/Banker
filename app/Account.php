<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['user_id', 'account_id', 'transaction_amount', 'transaction_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

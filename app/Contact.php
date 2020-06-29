<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
      'address',
      'first_name',
      'last_name',
      'user_id'
    ];

    protected $hidden = [
      'user_id'
    ];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}

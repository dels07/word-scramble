<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['user_id', 'word_id', 'point'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function word()
    {
        return $this->belongsTo('App\Word', 'word_id');
    }
}

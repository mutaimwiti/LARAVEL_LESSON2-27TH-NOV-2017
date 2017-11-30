<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'body', 'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}

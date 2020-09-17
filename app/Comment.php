<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use Notifiable;
    protected $fillable = [
        'author', 'comment'
    ];
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}

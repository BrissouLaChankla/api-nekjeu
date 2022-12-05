<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'avatar',
        'score',
        'gametype_id'
    ];

    public function gametype() {
        return $this->belongsTo(Gametype::class);
    }


}

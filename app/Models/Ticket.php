<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'amount',
        'movie_id',
        'user_id',
    ];
    use HasFactory;
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

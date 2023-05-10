<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //protected $fillable = ['title', 'genre_id', 'description', 'price', 'image', 'date', 'duration', 'rating', 'amount'];
    protected $guarded = [];

    use HasFactory;
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}

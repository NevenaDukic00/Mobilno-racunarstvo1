<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Resources\MovieResource;

class MovieController extends Controller
{
    public function index()
    {
        $movie = Movie::all();
        return MovieResource::collection($movie);
    }

}

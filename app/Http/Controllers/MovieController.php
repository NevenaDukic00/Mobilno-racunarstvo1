<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Resources\MovieResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class MovieController extends Controller
{
    public function index()
    {
        $movie = Movie::all();
        return MovieResource::collection($movie);
    }

    public function destroy($movieid)
    {

        if (Auth::user()->email != "admin@gmail.com") {
            return response()->json(['response' => "You cannot delete the theatre because you are not an admin!"]);
        }

        $m = Movie::find($movieid);
        if ($m == null) {
            return response()->json(['response' => 'Movie does not exsist!']);
        }
       
        if ($m->delete()) {
            return response()->json(['response' => 'success']);
        } else {
            return response()->json(['response' => 'failed!']);
        }
    }
}

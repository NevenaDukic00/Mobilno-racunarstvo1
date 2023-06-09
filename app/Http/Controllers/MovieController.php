<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Resources\MovieResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    public function index()
    {
        $movie = Movie::all();
        return MovieResource::collection($movie);
    }

    public function add(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:255',
                'genre_id' => '',
                'description' => 'required|string|max:255',
                'date' => 'required',
                'duration' => 'required',
                'image' => 'required',
                'price' => 'required',
                'rating' => 'required',
                'amount' => ''

            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }


        $movie = Movie::create([
            'title' => $request->title,
            'genre_id' => $request->genre_id,
            'description' => $request->description,
            'date' => $request->date,
            'duration' => $request->duration,
            'image' => $request->image,
            'price' => $request->price,
            'rating' => $request->rating,
            'amount' => 0
        ]);

        return response()->json(['success' => 'true', 'response' => 'Movie successfully added!']);
    }

    public function edit(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required',
                'price' => 'required'


            ]
        );


        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $movie = Movie::find($request->id);
        //$movie->title = $movie->title;
        $movie->price = $request->price;

        $movie->save();


        return response()->json(['success' => 'true', 'response' => 'You have successfully changed movie price!']);
    }

    public function update(Request $request, Movie $movie)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'amount' => 'required'

            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }


        $movie->amount = $request->amount;

        $movie->save();


        return response()->json(['response' => 'You have successfully changed movie!']);
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

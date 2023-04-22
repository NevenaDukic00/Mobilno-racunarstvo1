<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Movie;
use App\Http\Resources\TicketResource;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class TicketController extends Controller
{
    public function index($id)
    {
       
        $tickets = Ticket::get()->where('movie_id',$id);
        // $tickets = Ticket::get()->where('user_id', Auth::user()->id);
        // if (sizeof($tickets) == 0) {
        //     return response()->json(['response' => "You don't have any ticket ordered!"]);
        // }
        return TicketResource::collection($tickets);

    }
    public function store(Request $request)
    {
      
        $validator = Validator::make(
            $request->all(),
            [
                'price' => 'required',
                'movie_id'=>'required',
                'seat_number'=>'required',
            ]
        );
       
        
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

    
        
        $ticket = Ticket::create([
            'price' => $request->price,
            'user_id' => Auth::id(),
            'movie_id' => $request->movie_id,
            'seat_number' => $request->seat_number,
        ]);
        
        
        return response()->json(['response' => 'You have successfully created new ticket!']);
    
    }
}

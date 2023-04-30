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

        return TicketResource::collection($tickets);

    }
    public function index1()
    {
       
        $tickets = Ticket::get()->where('user_id', Auth::user()->id);

        return TicketResource::collection($tickets);

    }
    public function store(Request $request)
    {
      
        $validator = Validator::make(
            $request->all(),
            [
                'amount' => 'required',
                'movie_id'=>'required'
            ]
        );
       
        
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

    
        
        $ticket = Ticket::create([
            'amount' => $request->amount,
            'user_id' => Auth::id(),
            'movie_id' => $request->movie_id
        ]);
        
        
        return response()->json(['response' => 'success!']);
    
    }
}

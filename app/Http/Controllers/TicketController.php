<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Http\Resources\TicketResource;
class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::get();
        // $tickets = Ticket::get()->where('user_id', Auth::user()->id);
        // if (sizeof($tickets) == 0) {
        //     return response()->json(['response' => "You don't have any ticket ordered!"]);
        // }
        return TicketResource::collection($tickets);

    }
}

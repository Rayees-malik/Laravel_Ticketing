<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Auth;

use App\Models\Ticket;

use App\Models\User;

class TicketController extends Controller
{

    public function showTicket(Request $request){
        $ticket = Ticket::withTrashed()->findorFail($request->id);

        return view('tickets.show',['ticket'=>$ticket]);
    }

    public function viewTickets(){
        $tickets = Ticket::withTrashed()->get();

        return view('tickets.index',['tickets'=>$tickets]);
    }

    public function createTicket(){
        $users = null;

        if(Gate::allows('create_tickets_on_behalf')){
            $users = User::where('type',3)->get(['name','id']);
        }

        return view('tickets.create',['users'=>$users]);
    }

    public function editTicket(Request $request){

        $users = null;
        
        if(Gate::allows('create_tickets_on_behalf')){
            $users = User::where('type',3)->get(['name','id']);
        }

        $ticket = Ticket::withTrashed()->findOrFail($request->id);

        return view('tickets.edit',['ticket'=>$ticket, 'users'=>$users]);
    }

    public function storeTicket(Request $request){

        $request->validate([
            'description' => 'required',
            'notes' => 'max:128' 
        ]);

        $ticket = Ticket::create([
            'description' => $request->description,
            'user_id' => (Gate::allows('create_tickets_on_behalf') && $request->affected_user_id) ? $request->affected_user_id : Auth::user()->id,
            'notes' => $request->notes
        ]);

        $ticket->save();

        return redirect('/tickets');
    }


    public function updateTicket(Request $request){

        if($request->restore){

            $ticket = Ticket::withTrashed()->findOrFail($request->id);

            $ticket->restore();

            return redirect('/tickets');
        }

        $request->validate([
            'description' => 'required',
            'notes' => 'max:128' 
        ]);

        $ticket = Ticket::findOrFail($request->id);

        $ticket->description = $request->description;

        $ticket->notes = $request->notes;

        $ticket->save();

        return redirect('/tickets');
    }

    public function deleteTicket(Request $request){

        $ticket = Ticket::findOrFail($request->id);

        $ticket->delete();

        return redirect('/tickets');
    }
}

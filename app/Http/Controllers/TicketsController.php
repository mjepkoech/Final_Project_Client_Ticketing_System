<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Ticket;
use App\Mailers\AppMailer;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{

    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();

        return view('tickets.create', compact('categories'));
    }

    /**
     * @param Request $request
     * @param AppMailer $mailer
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'message' => 'required'
        ]);

        $ticket = new Ticket([
            'title' => $request->get('title'),
            'user_id' => \auth()->id(),
            'ticket_id' => strtoupper(str_random(10)),
            'category_id' => $request->get('category'),
            'priority' => $request->get('priority'),
            'message' => $request->get('message'),
            'status' => "Pending",
        ]);

        $ticket->save();

        $mailer->sendTicketInformation(Auth::user(), $ticket);

        return response()->json(array("status", "A ticket with ID: #$ticket->ticket_id has been raised."));

        //  return redirect()->back()->with("status", "A ticket with ID: #$ticket->ticket_id has been raised.");
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(5);
        $categories = Category::all();
        return response()->json($tickets);


    }

    /**
     * @param $ticket_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);

        $category = $ticket->category;

        return response()->json($ticket);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCategories()
    {
        return Category::all();
    }
}

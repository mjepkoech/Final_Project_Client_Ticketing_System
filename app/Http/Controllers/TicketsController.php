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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tickets = Ticket::paginate(10);
        $categories = Category::all();

        return view('tickets.index', compact('tickets', 'categories'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

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

         // return redirect()->back()->with("status", "A ticket with ID: #$ticket->ticket_id has been raised.");
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(5);
        return response()->json($tickets);
        //return view('tickets.user_tickets', compact('tickets', 'categories'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function queuedUserTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(5);
        $categories = Category::all();
        return response()->json($tickets);
        //return view('tickets.user_tickets', compact('tickets', 'categories'));
    }
    /**
     * @param $ticket_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($ticket_id)
    {
        $ticket = $this->getTickets(Ticket::findOrFail($ticket_id));
        return response()->json($ticket);
    }

    public function getTickets(Ticket $ticket)
    {
        return (object)[
            'ticket'=>$ticket,
            'comment' => $ticket->comment,
        ];
    }

    public function staffView($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $comments = $ticket->comments;

        $category = $ticket->category;

        return view('tickets.staffView', compact('ticket', 'category', 'comments'));
    }

    public function close($ticket_id, AppMailer $mailer)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $ticket->status = 'Closed';

        $ticket->save();

        $ticketOwner = $ticket->user;

        $mailer->sendTicketStatusNotification($ticketOwner, $ticket);

//        $mailer->sendTicketStatusNotification($ticketOwner, $ticket)

        return redirect()->back()->with("status", "The ticket has been closed.");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCategories()
    {
        return Category::all();
    }

    /**
     * @param $ticket_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

}

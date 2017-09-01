@extends('layouts.app')

@section('title', 'My Tickets')

@section('content')
    <div class="app-dashboard-sidebar-inner">

        <side-bar></side-bar>

    </div>
    <div class="row">

        <div class="row expanded app-dashboard-top-nav-bar">
            <div><h5>My Tickets</h5></div>
        </div>
        <div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>

        <div class="panel callout radius">
            @if ($tickets->isEmpty())
                <p>You have not created any tickets.</p>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Last Updated</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>
                                @foreach ($categories as $category)
                                    @if ($category->id === $ticket->category_id)
                                        {{ $category->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                                    #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                </a>
                            </td>
                            <td>
                                @if ($ticket->status === 'Open')
                                    <span class="label label-success">{{ $ticket->status }}</span>
                                @else
                                    <span class="label label-danger">{{ $ticket->status }}</span>
                                @endif
                            </td>
                            <td>{{ $ticket->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                        {{ $tickets->render() }}
            @endif
        </div>
    </div>
    </div>
@endsection
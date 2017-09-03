{{--@extends('layouts.app')--}}

{{--@section('content')--}}
            {{--@if (session('status'))--}}
                {{--<div class="callout alert">--}}
                    {{--{{ session('status') }}--}}
                {{--</div>--}}
            {{--@endif--}}
            {{--<dashboard></dashboard>--}}

{{--@endsection--}}

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    @if (Auth::user()->is_admin)
                        <div class="panel-heading">Dashboard</div>

                        <div class="panel-body">
                            <p>You are logged in!</p>
                            <p>
                                See all <a href="{{ url('admin/tickets') }}">tickets</a>
                            </p>
                        </div>
                        @else
                            <p>
                                <dashboard></dashboard>
                            </p>
                        @endif
                </div>
            </div>
        </div>
    </div>
@endsection
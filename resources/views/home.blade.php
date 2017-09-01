@extends('layouts.app')

@section('content')
            @if (session('status'))
                <div class="callout alert">
                    {{ session('status') }}
                </div>
            @endif
            <dashboard></dashboard>

@endsection

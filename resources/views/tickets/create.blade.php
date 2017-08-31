@extends('layouts.app')

@section('title', 'Open Ticket')

@section('content')
    <div class="row">

        <div class="row expanded app-dashboard-top-nav-bar">
            <div><h5>Raise Ticket</h5></div>
        </div>

        <div class="panel callout radius">
            @include('includes.flash')

            <form method="POST" action="{{ url('/new_ticket') }}">
                {!! csrf_field() !!}

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title</label>

                    <div>
                        <input id="title" type="text" name="title" value="{{ old('title') }}">

                        @if ($errors->has('title'))
                            <span>
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                    <label for="category">Category</label>
                    <div>
                        <select id="category" type="category" name="category">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('category'))
                            <span>
                                <strong>{{ $errors->first('category') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                    <label for="priority">Priority</label>

                    <div>
                        <select id="priority" type="" name="priority">
                            <option value="">Select Priority</option>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>

                        @if ($errors->has('priority'))
                            <span class="help-block">
                                <strong>{{ $errors->first('priority') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                    <label for="message">Description</label>

                    <div>
                        <textarea rows="5" id="message" class="form-control" name="message"></textarea>

                        @if ($errors->has('message'))
                            <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div>
                    <button type="submit" class="button">
                        <i class="fa fa-btn fa-ticket"></i> Submit Ticket
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
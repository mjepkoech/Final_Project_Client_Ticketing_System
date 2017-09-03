<!DOCTYPE html>
<html>
<head>
    <title>User list - PDF</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="panel callout alert">
    <a href="{{ route('generate-pdf',['download'=>'pdf']) }}">Download PDF</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($tickets as $key => $value)
            <tr>
                <td>{{ $value->title }}</td>
                <td>{{ $value->message }}</td>
                <td>{{ $value->priority }}</td>
                <td>{{ $value->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ url('index') }}">
        back
    </a>
</div>
</body>
</html>
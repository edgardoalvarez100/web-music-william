@extends('admin.pdf.layout')

@section('title','Stories')

@section('content')
<h2>List stories</h2>
<table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Autor</th>
                <th>Email</th>
                <th>Message</th>
            </tr>                            
        </thead>
        <tbody>
            @foreach($stories as $story)
            <tr>
                <td>{{ $story->id }}</td>
                <td >{{ $story->name }}</td>
                <td>{{ $story->email }}</td>
                <td style="word-wrap: break-word">{!! $story->body !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
@endsection
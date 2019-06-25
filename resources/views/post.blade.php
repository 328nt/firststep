@extends('layouts.app')

@section('contents')
    <h1>this ys contents</h1>
    <h2>List Posts</h2>
    @if (count($posts))
    
    <ul>
        @foreach ($posts as $postV)
            <li> {{$postV}} </li>
        @endforeach
    </ul>
    @endif
@endsection

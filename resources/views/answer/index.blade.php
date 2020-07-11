@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>No</th>
            <th>Date Posted</th>
            <th>Question</th>
            <th>Answer</th>
        </tr>
        </thead>
        <tbody>
            @foreach($items as $key => $item) 
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->date_created }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->content }}</td>                    
                </tr>            
            @endforeach
        </tbody>
    </table>

@endsection
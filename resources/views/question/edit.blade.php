@extends('adminlte.master')

@section('content')
    <h1>Edit Question #{{ $question->id }}</h1>
    <div class="ml-4">
        <form action="/question/{{ $question->id }}" method="POST">
            @csrf
            @method('PUT')
            <!-- <div class="form-group">
                <label for="username">Nama User</label><br>
                <input type="text" name="username">
            </div> -->

            <div class="form-group">
                <label for="title">Question Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $question-> title }}">
            </div>

            <div class="form-group">
                <label for="content">Question content</label>
                <textarea id="content" class="form-control" name="content" id="content" rows="10">{{ $question->content }}
                </textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-default" value="Update">
            </div>
        </form>
    </div>
@endsection

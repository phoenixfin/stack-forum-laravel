@extends('layouts.app')

@section('content')
    <h1>Edit pertanyaan</h1>
    <div class="">
        <form action="/question/{{$question->id}}" method="POST">
            @csrf
            @method('PUT')
            <!-- <div class="form-group">
                <label for="username">Nama User</label><br>
                <input type="text" name="username">
            </div> -->

            <div class="form-group">
                <label for="title">Judul pertanyaan</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $question->title}}">
            </div>

            <div class="form-group">
                <label for="content">Isi pertanyaan</label>
                <textarea id="content" class="form-control tinymce-editor" name="content" id="content" rows="10">
                {{ $question->content }}
                </textarea>
            </div>

            <div class="form-group">
                <label for="tags">Tags</label>
                <input type="text" class="form-control" name="tags" id="tags" value="{{$question->tags}}">
            </div>            

            <div class="form-group">
                <input type="submit" class="btn btn-dark bg-primary border-0 shadow" value="Save">
            </div>
        </form>
    </div>
@endsection


@push('additional_scripts')
    @include('layouts.scripts.tinymce')
@endpush

@extends('layouts.app')

@section('content')
    <h1>Berikan jawaban</h1>

    <section class="content">

        <!-- Default box -->
        <div class="card border-0 border-left-primary shadow mb-5">
          <div class="card-header bg-white border-0">
            <h3 class="card-title m-0">{{ $question->title }}</h3>
          </div>
          <div class="card-body border-0">
              <p class="card-text">{{$question->content}}</p>
          </div>
        </div>

        <form action="/answer/{{ $question->id }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea id="content" class="form-control tinymce-editor" name="content" id="content" rows="10">
                </textarea>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-dark bg-primary border-0 shadow" value="Kirim">
            </div>
        </form>
    </section>
    

@endsection


@push('additional_scripts')
    @include('layouts.scripts.tinymce')
@endpush



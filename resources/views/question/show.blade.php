@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid p-0">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Detail pertanyaan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right pb-0" style="background:none;">
                <li class="breadcrumb-item"><a href="/question">Back</a></li>
                <li class="breadcrumb-item active">Detail Pertanyaan</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card border-0 border-left-primary shadow">
          <div class="card-header bg-white border-0">
            <h3 class="card-title m-0">{{ $question->title }}</h3>
          </div>
          <div class="card-body border-0">
            <h6 class="card-subtitle"><i><i class="far fa-clock"></i> {{ Carbon\Carbon::parse($question->date_created)->format('d F Y - H:i:s') }}</i></h6><br>
          <p class="card-text">{!! $question->content !!}</p>
          </div>

          <div class="card-footer border-0">
            <?php $tags = explode(',', $question->tags)?>
            @foreach($tags as $tag)
                @if ($tag != '')
                    <span class="badge badge-secondary">{{ '#'.$tag }}</span>
                @endif
            @endforeach
          </div>
          <div class="card-footer border-0 form-inline">
            <ul class="list-unstyled form-inline m-0 mt-2 col-6">
                <li class="nav-item">
                <button class="btn upvote" onclick="upvote('{{$question->id}}',this,'question')">
                        <!-- <i class="fas fa-thumbs-up"></i> -->
                        <i class="far fa-thumbs-up"></i>
                        <span class="d-inline" id="question-{{$question->id}}-up">{{$question->upvote_count}}</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="btn downvote" onclick="downvote('{{$question->id}}',this,'question')">
                        <!-- <i class="fas fa-thumbs-down"></i> -->
                        <i class="far fa-thumbs-down"></i>
                        <span class="d-inline" id="question-{{$question->id}}-down">{{$question->downvote_count}}</span>
                    </a>
                </li>
            </ul>

            @if(Auth::check() && Auth::user()->id == $question->user_id)
            <div class="col-6 text-right">
              <a href="/question/{{$question->id}}/edit" class="btn btn-circle btn-warning shadow"><i class="fas fa-edit"></i></a>
              <form action="/question/{{$question->id}}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-circle btn-danger shadow"><i class="fas fa-trash"></i></button>
              </form>
            </div>
            @endif
          </div>
          <!-- /.card-body -->          
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        <h1 class="mt-5">Semua jawaban</h1><br>
        <a href="/answer/{{$question->id}}/create" class="btn border-left-info shadow mb-2">Tambah jawaban</a>        
        @foreach ($question->answers as $answer)
          <div class="card border-0 border-left-success mb-4 shadow">   
            <div class="card-header border-0">
              <h6>{{ $answer->user_data->name }}</h6>
              <i><i class="far fa-clock"></i> {{ Carbon\Carbon::parse($answer->date_modified)->format('d F Y - H:i:s') }}</i>
            </div>                 
            <div class="card-body border-0">
              {!! $answer->content !!}
            </div>
            <div class="card-footer border-0 form-inline">
              <ul class="list-unstyled form-inline m-0 mt-2 col-6">
                  <li class="nav-item">
                  <button class="btn upvote" onclick="upvote('{{$answer->id}}',this,'answer')">
                          <!-- <i class="fas fa-thumbs-up"></i> -->
                          <i class="far fa-thumbs-up"></i>
                          <span class="d-inline" id="answer-{{$answer->id}}-up">{{$answer->upvote_count}}</span>
                      </button>
                  </li>
                  <li class="nav-item">
                      <button class="btn downvote" onclick="downvote('{{$answer->id}}',this,'answer')">
                          <!-- <i class="fas fa-thumbs-down"></i> -->
                          <i class="far fa-thumbs-down"></i>
                          <span class="d-inline" id="answer-{{$answer->id}}-down">{{$answer->downvote_count}}</span>
                      </a>
                  </li>
              </ul>
              @if(Auth::check() && Auth::user()->id == $answer->user_id)
              <div class="col-6 text-right">
                <a href="/answer/{{$question->id}}/{{$answer->id}}/edit" class="btn btn-circle btn-warning shadow"><i class="fas fa-edit"></i></a>
                <form action="/answer/{{$question->id}}/{{$answer->id}}" method="post" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-circle btn-danger shadow"><i class="fas fa-trash"></i></button>
                </form>
              </div>
              @endif
            </div>
          </div>
        @endforeach        

      </section>
      <!-- /.content -->
    </div>


@endsection

@push('additional_scripts')
    @include('layouts.scripts.vote')
@endpush
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
              <ol class="breadcrumb float-sm-right">
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
            <h6 class="card-subtitle"><i><i class="far fa-clock"></i> {{ $question->date_created }}</i></h6><br>
          <p class="card-text">{{$question->content}}</p>
          </div>

          <div class="card-footer border-0">
            <?php $tags = explode(',', $question->tags)?>
            @foreach($tags as $tag)
                @if ($tag != '')
                    <span class="btn btn-sm btn-info">{{ $tag }}</span>
                @endif
            @endforeach
          </div>
          <div class="card-footer border-0 form-inline">
            <ul class="list-unstyled form-inline m-0 mt-2 col-6">
              <li class="nav-item">
                  <a class="nav-link row" href="index.html">
                      <!-- <i class="fas fa-thumbs-up"></i> -->
                      <i class="far fa-thumbs-up"></i>
                      <span class="d-inline">12</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link row" href="index.html">
                      <!-- <i class="fas fa-thumbs-down"></i> -->
                      <i class="far fa-thumbs-down"></i>
                      <span class="d-inline">12</span>
                  </a>
              </li>
            </ul>
            <div class="col-6 text-right">
              <a href="/question/{{$question->id}}/edit" class="btn btn-circle btn-warning shadow"><i class="fas fa-edit"></i></a>
              <form action="/question/{{$question->id}}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-circle btn-danger shadow"><i class="fas fa-trash"></i></button>
              </form>
            </div>
          </div>
          <!-- /.card-body -->          
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        <h1 class="mt-5">Semua jawaban</h1><br>
        <a href="/answer/{{$question->id}}/create" class="btn btn-info shadow mb-2">Tambah jawaban</a>        
        @foreach ($question->answers as $answer)
          <div class="card border-0 border-left-success mb-4 shadow">   
            <div class="card-header border-0">
              <i><i class="far fa-clock"></i>${{ $answer->date_created }}</i>
              <h6>{{ $answer->user_data->name }}</h6>
            </div>                 
            <div class="card-body border-0">
              {{$answer->content}}
            </div>
            <div class="card-footer border-0 form-inline">
              <ul class="list-unstyled form-inline m-0 mt-2 col-6">
                <li class="nav-item">
                    <a class="nav-link row" href="index.html">
                        <!-- <i class="fas fa-thumbs-up"></i> -->
                        <i class="far fa-thumbs-up"></i>
                        <span class="d-inline">12</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link row" href="index.html">
                        <!-- <i class="fas fa-thumbs-down"></i> -->
                        <i class="far fa-thumbs-down"></i>
                        <span class="d-inline">12</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link row" href="index.html">
                        <!-- <i class="fas fa-thumbs-up"></i> -->
                        <i class="far fa-star"></i>
                    </a>
                </li>
              </ul>
              <div class="col-6 text-right">
                <a href="/answer/{{$question->id}}/{{$answer->id}}/edit" class="btn btn-circle btn-warning shadow"><i class="fas fa-edit"></i></a>
                <form action="/answer/{{$question->id}}/{{$answer->id}}" method="post" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-circle btn-danger shadow"><i class="fas fa-trash"></i></button>
                </form>
              </div>
            </div>
          </div>
        @endforeach        

      </section>
      <!-- /.content -->
    </div>


@endsection

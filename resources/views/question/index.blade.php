@extends('layouts.app')

@section('title')
    <title>LaraForum</title>
@endsection

@section('content')
    @include('layouts.scripts.vote')    
    <div class="container-fluid p-0">
        <!-- Page Heading -->     
        <div class="col-12 mb-4 pl-0">
            <h3>Semua pertanyaan</h3>
            <hr class="sidebar-divider">
        </div>
        <a href="/question/create" class="btn border-left-info shadow mb-2">Tambah pertanyaan</a>
        <br>               
        @foreach($questions as $q)
            <div class="col-12 mb-4 pl-0">
                <div class="card border-0 border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">{{$q->user_data->name}}</div>
                                <div class="text-xs mb-3 font-italic text-gray-800"><i class="far fa-clock"></i> {{ Carbon\Carbon::parse($q->date_created)->format('d F Y - H:i:s') }}</div>
                            <div class="h5 mb-3 font-weight-bold text-gray-800"><a href="/question/{{$q->id}}">{{$q->title}}</a></div>
                                <div class="h6 mb-0 font-weight-bold text-gray-600">{!! Str::limit($q->content, 20) !!}</div>
                                <div class="nav-item mt-3">
                                    <?php $tags = explode(',', $q->tags)?>
                                    @foreach($tags as $tag)
                                        @if ($tag != '')
                                            <span class="badge badge-secondary">{{ '#'.$tag }}</span>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="form-inline">                                    
                                    <ul class="list-unstyled form-inline m-0 mt-2 col-6">
                                        <li class="nav-item">
                                        <button class="btn upvote" onclick="upvote('{{$q->id}}',this,'question')">
                                                <!-- <i class="fas fa-thumbs-up"></i> -->
                                                <i class="far fa-thumbs-up"></i>
                                                <span class="d-inline" id="question-{{$q->id}}-up">{{$q->upvote_count}}</span>
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="btn downvote" onclick="downvote('{{$q->id}}',this,'question')">
                                                <!-- <i class="fas fa-thumbs-down"></i> -->
                                                <i class="far fa-thumbs-down"></i>
                                                <span class="d-inline" id="question-{{$q->id}}-down">{{$q->downvote_count}}</span>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                    @if(Auth::check() && Auth::user()->id == $q->user_id)
                                    <div class="col-6 text-right">
                                        <a href="/question/{{$q->id}}/edit" class="btn btn-circle btn-warning shadow"><i class="fas fa-edit"></i></a>
                                        <form action="/question/{{$q->id}}" method="post" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-circle btn-danger shadow"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection

@push('additional_scripts')
    @include('layouts.scripts.vote')
@endpush
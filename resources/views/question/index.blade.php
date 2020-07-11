@extends('layouts.app')

@section('title')
    <title>LaraForum</title>
@endsection

@section('content')
    <div class="container-fluid p-0">
        <!-- Page Heading -->     
        <div class="col-12 mb-4 pl-0">
            <h3>Semua pertanyaan</h3>
            <hr class="sidebar-divider">
        </div>
        <a href="/question/create" class="btn btn-info shadow mb-2">Tambah pertanyaan</a>
        <br>               
        @foreach($questions as $q)
            <div class="col-12 mb-4 pl-0">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">{{$q->user_data->name}}</div>
                                <div class="text-xs mb-3 font-italic text-gray-800"><i class="far fa-clock"></i>{{ $q->date_created }}</div>
                            <div class="h5 mb-3 font-weight-bold text-gray-800"><a href="/question/{{$q->id}}">{{$q->title}}</a></div>
                                <div class="h6 mb-0 font-weight-bold text-gray-600">{{$q->content}}</div>
                                <div class="nav-item">
                                    <?php $tags = explode(',', $q->tags)?>
                                    @foreach($tags as $tag)
                                        @if ($tag != '')
                                            <span class="btn btn-sm btn-info">{{ $tag }}</span>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="form-inline">
                                    <ul class="list-unstyled form-inline m-0 mt-2 col-6">
                                        <li class="nav-item">
                                            <a class="nav-link row upvote" href="index.html">
                                                <!-- <i class="fas fa-thumbs-up"></i> -->
                                                <i class="far fa-thumbs-up"></i>
                                                <span class="d-inline">12</span>
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link row downvote" href="index.html">
                                                <!-- <i class="fas fa-thumbs-down"></i> -->
                                                <i class="far fa-thumbs-down"></i>
                                                <span class="d-inline">12</span>
                                            </a>
                                        </li>
                                    </ul>
                        
                                    <div class="col-6 text-right">
                                        <a href="/answer/{{$q->id}}/create" class="btn btn-info shadow">Jawab</a>
                                        <a href="/question/{{$q->id}}/edit" class="btn btn-circle btn-warning shadow"><i class="fas fa-edit"></i></a>
                                        <form action="/question/{{$q->id}}" method="post" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-circle btn-danger shadow"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach




        {{-- <div class="col-12 mb-4 pl-0">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">Nama penanya</div>
                            <div class="text-xs mb-3 font-italic text-gray-800"><i class="far fa-clock"></i> 12 July 2020</div>
                            <div class="h5 mb-3 font-weight-bold text-gray-800"><a href="#">Judul pertanyaan disini</a></div>
                            <div class="h6 mb-0 font-weight-bold text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio inventore ratione fugit illo error. Mollitia, deserunt ducimus excepturi, enim amet non fugiat nemo alias architecto animi illo explicabo illum ipsa? ...</div>
                            <div class="form-inline">
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
                                            <i class="far fa-thumbs-up"></i>
                                            <span class="d-inline">12</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="col-6 text-right">
                                    <a href="/question/id/edit" class="btn btn-circle btn-warning shadow"><i class="fas fa-edit"></i></a>
                                    <form action="/question/id" method="post" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-circle btn-danger shadow"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4 pl-0">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">Nama penanya</div>
                            <div class="text-xs mb-3 font-italic text-gray-800"><i class="far fa-clock"></i> 12 July 2020</div>
                            <div class="h5 mb-3 font-weight-bold text-gray-800"><a href="#">Judul pertanyaan disini</a></div>
                            <div class="h6 mb-0 font-weight-bold text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio inventore ratione fugit illo error. Mollitia, deserunt ducimus excepturi, enim amet non fugiat nemo alias architecto animi illo explicabo illum ipsa? ...</div>
                            <div class="form-inline">
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
                                            <i class="far fa-thumbs-up"></i>
                                            <span class="d-inline">12</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="col-6 text-right">
                                    <a href="/question/id/edit" class="btn btn-circle btn-warning shadow"><i class="fas fa-edit"></i></a>
                                    <form action="/question/id" method="post" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-circle btn-danger shadow"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection

@push('additional_scripts')
    @include('layouts.scripts.vote')
@endpush
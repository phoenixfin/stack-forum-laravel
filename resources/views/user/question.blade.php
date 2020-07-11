@extends('layouts.app')

@section('title')
    <title>LaraForum</title>
@endsection
ta
@section('content')
    <div class="col-12 mb-4 pl-0">
        <h3>List pertanyaanku</h3>
        <hr class="sidebar-divider">
    </div>

    <div class="col-12 mb-4 pl-0">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-3 font-weight-bold text-gray-800"><a href="#">Judul pertanyaan disini</a></div>
                        <div class="h6 mb-0 font-weight-bold text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio inventore ratione fugit illo error. Mollitia, deserunt ducimus excepturi, enim amet non fugiat nemo alias architecto animi illo explicabo illum ipsa? ...</div>
                        <div class="form-inline">
                            <ul class="list-unstyled form-inline m-0 mt-2 col-6">
                                <li class="nav-item">
                                    <span class="nav-link row text-primary">
                                        <!-- <i class="fas fa-thumbs-up"></i> -->
                                        <i class="far fa-thumbs-up"></i>
                                        <span class="d-inline">12</span>
                                    </span>
                                </li>
                                <li class="nav-item">
                                    <span class="nav-link row text-primary">
                                        <!-- <i class="fas fa-thumbs-down"></i> -->
                                        <i class="far fa-thumbs-down"></i>
                                        <span class="d-inline">12</span>
                                    </span>
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
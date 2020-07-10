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
                <li class="breadcrumb-item active">Question data question</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card border-0 border-left-primary shadow">
          <div class="card-header border-0">
            <h3 class="card-title m-0">question title</h3><br>
          </div>
          <div class="card-body border-0">
            <h6 class="card-subtitle"><i><i class="far fa-clock"></i> 12 july 2020</i></h6><br>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ducimus nulla minus atque, aspernatur accusamus? Consectetur voluptas corporis aliquid odit ipsam maiores aperiam nostrum velit dolorem unde voluptatibus, obcaecati maxime!</p>
          </div>
          <div class="card-footer border-0">
            <?php //$tags = explode(',', $article-> tags); ?>
              <!-- forech -->
              <span class="btn btn-sm btn-info">tag</span>
          </div>
          <div class="card-footer border-0">
            <ul class="list-unstyled form-inline m-0 mt-2">
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
          </div>
          <!-- /.card-body -->          
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        <h1 class="mt-5">Jawaban</h1><br>
        <div class="card border-0 border-left-success mb-4 shadow">   
          <div class="card-header border-0">
            <i><i class="far fa-clock"></i> 20 july 2020</i>
            <h6>Nama penjawab</h6>
          </div>                 
          <div class="card-body border-0">
            answer content
          </div>
          <div class="card-footer border-0">
            <ul class="list-unstyled form-inline m-0 mt-2">
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
          </div>
        </div>

        <div class="card border-0 border-left-warning mb-4 shadow">   
          <div class="card-header border-0">
            <i><i class="far fa-clock"></i> 20 july 2020</i>
            <h6>Nama penjawab</h6>
          </div>                 
          <div class="card-body border-0">
            answer content
          </div>
          <div class="card-footer border-0">
            <ul class="list-unstyled form-inline m-0 mt-2">
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
          </div>
        </div>

        <div class="card border-0 border-left-warning mb-4 shadow">   
          <div class="card-header border-0">
            <i><i class="far fa-clock"></i> 20 july 2020</i>
            <h6>Nama penjawab</h6>
          </div>                 
          <div class="card-body border-0">
            answer content
          </div>
          <div class="card-footer border-0">
            <ul class="list-unstyled form-inline m-0 mt-2">
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
          </div>
        </div>

      </section>
      <!-- /.content -->
    </div>


@endsection

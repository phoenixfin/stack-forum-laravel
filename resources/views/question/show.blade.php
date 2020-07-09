@extends('adminlte.master')

@section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Question Details</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/question">Back</a></li>
                <li class="breadcrumb-item active">Question #{{ $QA['Q']->id }}</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ $QA['Q']->title}}</h3><br>
          </div>
          <div class="card-body">
            <h6 class="card-subtitle"><i>{{ $QA['Q']-> date_created}}</i></h6><br>
            <p class="card-text">{{ $QA['Q']-> content}}</p>
          </div>
          <!-- /.card-body -->
          <div class="card-footer border-bottom">
            <?php $tags = explode(',', $article-> tags); ?>
            @foreach($tags as $tag)
              <span class="btn btn-sm btn-info">{{ $tag }}</span>
            @endforeach
          </div>
          
          <div class="card-footer border-bottom">
            <h5 class="card-subtitle">Answers</h5><br>
            <ul class="list-group list-group-flush">
                @foreach ($QA['A'] as $answer)
                    <li class="list-group-item">{{ $answer-> content }}</li>
                @endforeach

              </ul>
          </div>


          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>


@endsection

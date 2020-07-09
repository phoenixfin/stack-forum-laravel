@extends('adminlte.master')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Question with given id is not found</h1>
            <a href="/question/create" class="btn btn-sm btn-info">Create Question</a>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/answer">Back</a></li>
              <li class="breadcrumb-item active">Error</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
@endsection

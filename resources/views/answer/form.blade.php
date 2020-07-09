@extends('adminlte.master')

@section('content')
    <h1>Beri Jawaban Baru</h1>
    <div class="ml-4">
        <form action="/answer" method="POST">
            @csrf
            <!-- <div class="form-group">
                <label for="username">Nama User</label><br>
                <input type="text" name="username">
            </div> -->

            <div class="form-group">
                <label for="question">Pilih Pertanyaan</label>
                <select class="form-control" name="question_id" id="question_id">
                    @foreach($questions as $q)
                        <option value={{ $q-> id }}>{{ $q->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="content">Jawaban</label><br>
                <textarea id="content" class="form-control" name="content" rows="10">
                </textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-default" value="Kirim">
            </div>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Buat pertanyaan baru</h1>
    <div class="">
        <form action="/question" method="POST">
            @csrf
            <!-- <div class="form-group">
                <label for="username">Nama User</label><br>
                <input type="text" name="username">
            </div> -->

            <div class="form-group">
                <label for="title">Judul pertanyaan</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>

            <div class="form-group">
                <label for="content">Isi pertanyaan</label>
                <textarea id="content" class="form-control tinymce-editor" name="content" id="content" rows="10">
                </textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-dark bg-primary border-0 shadow" value="Simpan">
            </div>
        </form>
    </div>
@endsection


@push('additional_scripts')
    <script src="https://cdn.tiny.cloud/1/urbhmkislnnqn2038vdfqu9w384er53gobfi9y1ear1ql6er/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>
@endpush
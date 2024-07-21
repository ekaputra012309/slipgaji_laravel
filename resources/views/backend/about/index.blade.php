@extends('backend/template/app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit About Information</h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit About Information</h3>
                            </div>
                            <form action="{{ route('about.update', $about->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        @if ($about->logo)
                                            <div class="mb-2">
                                                <img src="{{ asset($about->logo) }}" alt="Current Logo"
                                                    style="max-width: 150px;">
                                            </div>
                                        @endif
                                        <input type="file" id="logo" class="form-control" name="logo">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" id="nama" class="form-control" name="nama"
                                            value="{{ $about->nama }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alias">Alias</label>
                                        <input type="text" id="alias" class="form-control" name="alias"
                                            value="{{ $about->alias }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" id="alamat" class="form-control" name="alamat"
                                            value="{{ $about->alamat }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea id="summernote" class="form-control" name="deskripsi">{{ $about->deskripsi }}</textarea>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{ route('about.index') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            $(function() {
                // Summernote
                $('#summernote').summernote()

            })
        </script>
    </div>
@endsection

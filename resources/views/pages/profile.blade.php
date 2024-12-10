@extends('partials.layouts.app')
@section('content')
    {{-- Breadcum --}}
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3"> Profile</h3>
            <h6 class="op-7 mb-2"> Data Profile Kamu ada disini !</h6>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('dashboard') }}" class="btn btn-danger btn-round">Dashboard</a>
        </div>
    </div>
    {{-- end Breadcum --}}
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Data Pengguna</h1>
                </div>

                <div class="card-body">
                    <div class="text-center">
                        <small>Pengguna</small><br>
                        <img src="{{ $data->image != '-' ? asset('uploads/img/' . $data->image) : asset('/assets/img/user.jpg') }}"
                            width="200px">
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td width="15%">Nama</td>
                                <td>: {{ $data->name }}</td>
                            </tr>
                            <tr>
                                <td width="15%">Email</td>
                                <td>: {{ $data->email }}</td>
                            </tr>
                            <tr>
                                <td width="15%">Password</td>
                                <td>: ********</td>
                            </tr>
                          
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Update Pengguna</h1>
                </div>
                <form action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="image">Foto</label>
                            <br>
                            <img src="{{ isset($data) && $data->image != '-' ? asset('uploads/') . '/img/' . $data->image : asset('assets/') . '/img/user.jpg' }}"
                                width="100" id="view_img" class="img img-circle my-3">
                            <input type="file" accept="image/*" name="image" id="image" class="form-control form-input-file">
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control form-input"
                                placeholder="Nama" value="{{ isset($data) ? $data->name : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control form-input"
                                placeholder="Email" value="{{ isset($data) ? $data->email : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-input"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('content-js')
    <script>
        $('#image').change(function(event) {
            $("#view_img").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
        });
    </script>
@endsection
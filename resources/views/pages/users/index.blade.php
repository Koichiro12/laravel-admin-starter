@extends('partials.layouts.app')
@section('content')
    {{-- Breadcum --}}
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Pengguna</h3>
            <h6 class="op-7 mb-2">Semua Data Pengguna akan muncul disini !</h6>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{route('pengguna.create')}}" class="btn btn-primary btn-round">Tambah Pengguna</a>
        </div>
    </div>
    {{-- end Breadcum --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Data Pengguna</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                  
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>
                                            <img
                                            src="{{ $item->image != '-' ? asset('uploads/img/'.$item->image) : asset('/assets/img/user.jpg')}}"
                                            alt="..."
                                            width="50"
                                            class="img img-circle rounded-circle"
                                          />
                                        </td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>**********</td>
                                       
                                        <td>
                                            <form action="{{route('pengguna.destroy',$item->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('pengguna.edit',$item->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                <button type="submit" class="btn btn-sm btn-danger form-submit"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

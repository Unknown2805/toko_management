@extends('layouts.master')
@section('main')
    @foreach ($supplier as $s)
        <div class="modal fade" id="deleteSupp{{ $s->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <form action={{ url('/supplier/delete/' . $s->id) }} method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <center class="mt-3">
                                <h5>
                                    apakah anda yakin ingin menghapus data ini?
                                </h5>
                            </center>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger">Hapus!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <h2 class="mb-3">Supplier</h2>
    
    <div class="card">
        <div class="card-body">

            <button type="button" class="btn btn-primary btn-md mb-3" data-bs-toggle="modal" data-bs-target="#addSupp">
                Add +
            </button>
            <table class="table" id="table1">
                <thead>
                    <th>Photo</th>
                    <th>Supplier</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($supplier as $s)
                        <tr>
                            <td> 
                                    <img src="{{ $s->image == null ? asset('assets/images/samples/bg-mountain.jpg') : asset('/storage/supplier/'. $s->image) }}" style="height: 170px;width:170px;border-radius:10px;">
                            </td>         
                            <td>{{$s->name}}</td>
                            <td>{{$s->address}}</td>
                            <td>{{$s->email}}</td>
                            <td>
                                <a class="btn shadow btn-outline-success btn-md shadow me-2" data-bs-toggle="modal" data-bs-target="#editSupp{{ $s->id }}">Edit</i></a>
                                <a class="btn shadow btn-outline-danger btn-md shadow" data-bs-toggle="modal" data-bs-target="#deleteSupp{{ $s->id }}">delete</i></a>
                            </td>
                        </tr>       
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('supplier/modalSupp')

@endsection
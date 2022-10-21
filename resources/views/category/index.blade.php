@extends('layouts.master')

@section('main')
    {{-- delete modal --}}
        @foreach ($category as $c)
            <div class="modal fade" id="deleteCat{{ $c->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <form action={{ url('/category/delete/' . $c->id) }} method="POST" enctype="multipart/form-data">
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
    
        <h2 class="mb-3">Category</h2>
    {{-- table --}}
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12 col-md-1">
                        <button type="button" class="btn btn-primary btn-md mb-3" data-bs-toggle="modal" data-bs-target="#addCat">
                            Add +
                        </button>
                    </div>
                    <div class="col-12 col-md-2">
                        <a class="btn btn-danger" href={{url('category/pdf')}}>
                            <span class="me-1"><i class="bi bi-printer-fill"></i></span>
                            PDF
                        </a>
                    </div>
                </div>

                <table class="table" id="table1">
                    
                    <thead>
                            <th>No</th>
                            <th>Categories</th> 
                            <th><center>Action</center></th>
                        
                    </thead>
                    <tbody>
                        @php $i=1 @endphp
                            @foreach ($category as $c)

                                <tr>
                                    <td>{{ $i++}}</td> 
                                    <td>{{ $c->name }}</td>                        
                                    <td>
                                        <center>
                                            <a class="btn shadow btn-outline-success btn-md shadow me-2" data-bs-toggle="modal" data-bs-target="#editCat{{ $c->id }}">Edit</i></a>
                                            <a class="btn shadow btn-outline-danger btn-md shadow" data-bs-toggle="modal" data-bs-target="#deleteCat{{ $c->id }}">delete</i></a>
                                        </center>
                                    </td>
                                </tr> 
                                    
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @include('category/modalCat')

@endsection
@extends('layouts.master')
@section('main')
    @foreach ($supplier as $s)
        @foreach ($s->products as $p)
            
        <div class="modal fade" id="deleteSupp{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <form action={{ url('/supplier/delete/' . $p->id) }} method="POST" enctype="multipart/form-data">
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
    @endforeach

    <h2 class="mb-3">Supplier</h2>
    
    <div class="card">
        <div class="card-body">

            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProduct">
                Add +
            </button>
            <table class="table"    >
                <thead>
                    <th>Photo</th>
                    <th>Supplier</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($supplier as $s)
                        @foreach($s->products as $p)
                        <tr>
                            <td> 
                                    <img src="{{ $p->image == null ? asset('assets/images/samples/bg-mountain.jpg') : asset('/storage/supplier/'. $p->image) }}" style="height: 170px;width:170px;border-radius:10px;">
                            </td>         
                            <td>{{$s->name}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->qty}}</td>
                            <td>{{$p->desc}}</td>
                            <td>{{$p->price}}</td>
                            <td>
                                <a class="btn shadow btn-outline-success btn-md shadow me-2" data-bs-toggle="modal" data-bs-target="#editProduct{{ $p->id }}">Edit</i></a>
                                <a class="btn shadow btn-outline-danger btn-md shadow" data-bs-toggle="modal" data-bs-target="#deleteProduct{{ $p->id }}">delete</i></a>
                            </td>
                        </tr>  
                        @endforeach     
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('product/modalProduct')

@endsection
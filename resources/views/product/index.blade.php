@extends('layouts.master')
@section('main')
    @foreach ($supplier as $s)
        @foreach ($s->categories as $c)
            @foreach ($c->products as $p)
                
            <div class="modal fade" id="deleteProduct{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <form action={{ url('/product/delete/' . $p->id) }} method="POST" enctype="multipart/form-data">
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
    @endforeach

    <h2 class="mb-3">Products</h2>
    
    <div class="card">
        <div class="card-body">

            @if (!isset($supplier[0]->name))
            @else
            <div class="row justify-content-between mb-3">
                <div class="col-12 col-md-12">
                    <button type="button" class="btn btn-primary btn-md mb-3" data-bs-toggle="modal" data-bs-target="#addProduct">
                        Add +
                    </button>
                </div>

            </div>
            @endif
            <table class="table" id="table1">
                <thead>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>                                
                        <div class="d-flex justify-content-center">                                    
                            Action
                        </div>
                    </th>
                </thead>
                <tbody>
                    @foreach($supplier as $s)
                        @foreach($s->categories as $c)
                            @foreach($c->products as $p)
                        
                                                                    
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>
                                <img src="{{ $p->image == null ? asset('assets/images/samples/banana.jpg') : asset('/storage/product/'. $s->image) }}" style="height: 170px;width:170px;border-radius:10px;">
                            </td>
                            <td>{{ $c->name}}</td>
                            <td>{{ $p->name }}</td>
                            <td>Rp. {{ $p->price }}</td>
                            
                            
                            <td>
                                <div class="d-flex justify-content-center">                                    
                                    <a class="btn shadow btn-outline-warning btn-md shadow me-2" data-bs-toggle="modal" data-bs-target="#viewProduct{{ $p->id }}">View</i></a>
                                    <a class="btn shadow btn-outline-success btn-md shadow me-2" data-bs-toggle="modal" data-bs-target="#editProduct{{ $p->id }}">Edit</i></a>
                                    <a class="btn shadow btn-outline-danger btn-md shadow" data-bs-toggle="modal" data-bs-target="#deleteProduct{{ $p->id }}">delete</i></a>
                                </div>
                            </td>
                        </tr>  
                            @endforeach
                        @endforeach     
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if(!isset($supplier[0]->name))
    <div class="text-center">
        <a href="{{url('/supplier')}}" class="text-danger">Add Supplier first</a>
    </div>
    @else
    @endif
    @include('product/modalProduct')

@endsection
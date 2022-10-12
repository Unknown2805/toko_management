@extends('layouts.master')

@section('main')

@foreach($category as $key => $c)
    @foreach($c->products as $p)
        @foreach($p->historyins as $hi)
            <div class="modal fade" id="deleteHisIn{{ $hi->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <form action={{ url('/history/out/delete/' . $hi->id) }} method="POST" enctype="multipart/form-data">
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



<h2 class="mb-3">History Products In</h2>
    
    <div class="card">
        <div class="card-body">

            <table class="table" id="table1">
                <thead>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Modal</th>
                    <th>                                
                        <div class="d-flex justify-content-center">                                    
                            Action
                        </div>
                    </th>
                
                </thead>
                <tbody>
                    @foreach($category as $key => $c)
                        @foreach($c->products as $p)
                            @foreach($p->historyins as $hi)
                                                                    
                                    <tr>
                                        <td>{{ ++$key}}</td>
                                        <td>
                                            <img src="{{ $p->image == null ? asset('assets/images/samples/image_default.jpg') : asset('/storage/product/'. $p->image) }}" style="height: 170px;width:170px;border-radius:10px;">
                                        </td>
                                        <td>{{ date('d-m-Y h:i', strtotime($hi->created_at))}}</td>
                                        <td>{{ $c->name }}</td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $hi->qty }}</td>  
                                        <td>Rp. @money((float)$hi->price)</td>                                                                              
                                        <td>
                                            <div class="d-flex justify-content-center">  
                                                <a class="btn shadow btn-outline-danger btn-md shadow" data-bs-toggle="modal" data-bs-target="#deleteProduct{{ $hi->id }}">Delete</i></a>
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
   
@endsection
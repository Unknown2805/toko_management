@extends('layouts.master')
@section('main')
        @foreach ($category as $c)
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

    <h2 class="mb-3">Products</h2>
    
    <div class="card">
        <div class="card-body">

          
                <div class="col-12 col-md-12">
                    <button type="button" class="btn btn-primary btn-md mb-3" data-bs-toggle="modal" data-bs-target="#addProduct">
                        Add +
                    </button>
                </div>

           
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
                        @foreach($category as $c)
                            @foreach($c->products as $p)
                        
                                                                    
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>
                                <img src="{{ $p->image == null ? asset('assets/images/samples/image_default.jpg') : asset('/storage/product/'. $p->image) }}" style="height: 170px;width:170px;border-radius:10px;">
                            </td>
                            <td>{{ $c->name}}</td>
                            <td>{{ $p->name }}</td>
                            <td>Rp. @money((float)$p->price)</td>
                            
                            
                            <td>
                                <div class="d-flex justify-content-center">                                    
                                    <a class="btn shadow btn-outline-warning btn-md shadow me-2" data-bs-toggle="modal" data-bs-target="#viewProduct{{ $p->id }}">View</i></a>
                                    <a class="btn shadow btn-outline-success btn-md shadow me-2" data-bs-toggle="modal" data-bs-target="#editProduct{{ $p->id }}">Edit</i></a>
                                    <a class="btn shadow btn-outline-danger btn-md shadow" data-bs-toggle="modal" data-bs-target="#deleteProduct{{ $p->id }}">Delete</i></a>
                                </div>
                            </td>
                        </tr>  
                            @endforeach
                        @endforeach     
                </tbody>
            </table>
        </div>
    </div>

    
    @include('product/modalProduct')

    <script type="text/javascript">
     

        function formatbaru(e){
            let hasil = formatedit(e.target.value);

            e.target.value = hasil;
        }
      
        /* Fungsi formateditom */
        function formatedit(angka) {
            var prefix = "Rp";
          var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            edit = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
      
          // tambahkan titik jika yang di input sudah menjadi angka ribuan
          if (ribuan) {
            separator = sisa ? '.' : '';
            edit += separator + ribuan.join('.');
          }
      
          edit = split[1] != undefined ? edit + ',' + split[1] : edit;
          return prefix == undefined ? edit : (edit ? 'Rp ' + edit : '');
        }
      </script>

@endsection
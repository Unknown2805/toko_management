@extends('layouts.master')
@section('main')
        

    <h2 class="mb-3">Products Out</h2>
    
    <div class="card">
        <div class="card-body">
   
            <table class="table" id="table1">
                <thead>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Quantity</th>
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
                            
                            @foreach($p->outs as $o)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>
                                    <img src="{{ $p->image == null ? asset('assets/images/samples/image_default.jpg') : asset('/storage/product/'. $p->image) }}" style="height: 170px;width:170px;border-radius:10px;">
                                </td>
                                <td>{{ $c->name}}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->qty < 1 ? "Sold Out" :  ($o->qty_k == null ? $p->qty : $o->qty_k)}}</td>        
                                @if ($o->price_k == null)
                                <td>No prices added yet</td>
                                @else
                                <td>Rp. @money((float)$o->price_k)</td>
                                @endif                            
                               
                                    
                                    
                                    <td>
                                        <div class="d-flex justify-content-center">                                    
                                            @if(isset($o->price_k))
                                            @if ($p->qty < 1)
                                            <a class="btn shadow btn-outline-secondary btn-md shadow me-2" data-bs-toggle="modal" data-bs-target="#">Sell</i></a>
                                            @else
                                            <a class="btn shadow btn-outline-warning btn-md shadow me-2" data-bs-toggle="modal" data-bs-target="#buyProduct{{ $o->id }}">Sell</i></a>
                                            @endif
                                            <a class="btn shadow btn-outline-success btn-md shadow me-2" data-bs-toggle="modal" data-bs-target="#editPriceProduct{{ $o->id }}">Edit</i></a>
                                            @else
                                            <a class="btn shadow btn-outline-primary btn-md shadow me-2" data-bs-toggle="modal" data-bs-target="#addProductOut{{ $o->id }}">Add</i></a>
                                            @endif
                                            <a class="btn shadow btn-outline-danger btn-md shadow" data-bs-toggle="modal" data-bs-target="#deleteProduct{{ $p->id }}">Delete</i></a>
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

    @include('out/modalProductOut')


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
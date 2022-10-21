@extends('layouts.master')

@section('main')

    {{-- table --}}
        <h2 class="mb-3">History Products Out</h2>
    
        <div class="card shadow">
            <div class="card-body">
                <a class="btn btn-danger" href={{url('history/out/pdf')}}>
                    <span class="me-1"><i class="bi bi-printer-fill"></i></span>
                    PDF
                </a>
                <table class="table" id="table1">
                    <thead>
                        <th>No</th>
                        <th>Photo</th>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>                      
                    
                    </thead>
                    <tbody>
                        @php $i=1 @endphp
                        @foreach($category as $key => $c)
                            @foreach($c->products as $p)
                                @foreach($p->outs as $o)
                                    @foreach($o->historyouts as $ho)
                                                                        
                                        <tr>
                                            <td>{{ $i++}}</td>
                                            <td>
                                                <img src="{{ $p->image == null ? asset('images/bg/image.png') : asset('/storage/product/'. $p->image) }}" style="height: 170px;width:170px;border-radius:10px;">
                                            </td>
                                            <td>{{ date('d-m-Y h:i', strtotime($ho->created_at))}}</td>
                                            <td>{{ $c->name }}</td>
                                            <td>{{ $p->name }}</td>
                                            <td>{{ $ho->qty_k }}</td>  
                                            <td>Rp. @money((float)$ho->price_k)</td>                                                                                                                                                 
                                        </tr> 

                                    @endforeach
                                @endforeach
                            @endforeach  
                        @endforeach   
                    </tbody>
                </table>
            
            </div>
        </div>
   
@endsection
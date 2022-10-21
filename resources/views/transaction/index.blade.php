@extends('layouts.master')

@section('main')

    {{-- table --}}
        <h2 class="mb-3">Product Sale</h2>
        
        <div class="card shadow">
            <div class="card-body">
                <a class="btn btn-danger" href={{url('transaction/pdf')}}>
                    <span class="me-1"><i class="bi bi-printer-fill"></i></span>
                    PDF
                </a>
                <table class="table" id="table1">
                    <thead>
                        <th>No</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Quantity</th> 
                        <th>Price</th>
                        <th>Total</th>           
                        <th class="text-success"> 
                            <span>Profit</span>
                            <i class="bi bi-arrow-up"></i>
                        </th>
                        <th class="text-danger">
                            <span>Loss</span>
                            <i class="bi bi-arrow-down"></i>
                        </th>
                        <th class="text-success">                            
                            <span>Netto</span>
                            <i class="bi bi-arrow-up"></i>
                        </th>
                        
                    
                    </thead>
                    <tbody>
                        @php $i=1 @endphp
                        @foreach($category as $key => $c)
                            @foreach($c->products as $p)
                                @foreach($p->outs as $o)
                                    @foreach($o->historyouts as $ho)
                                        @foreach($ho->transactions as $t)
                                                                        
                                        <tr>
                                            <td>{{ $i++}}</td>                                            
                                            <td>{{ $c->name }}</td>
                                            <td>{{ $p->name }}</td>
                                            <td>{{ $ho->qty_k }}</td>  
                                            <td>{{ $t->total }}
                                            <td>Rp. @money((float)$ho->price_k)</td>   
                                            <td class="text-success">Rp. @money((float)$t->profit)</td>
                                            <td class="text-danger">Rp. @money((float)$t->loss)</td>
                                            <td class="text-success">Rp. @money((float)$t->netto)</td>                                                                              
                                                                        
                                        
                                        </tr> 
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach  
                        @endforeach   
                    </tbody>
                </table>
            
            </div>
        </div>

@endsection
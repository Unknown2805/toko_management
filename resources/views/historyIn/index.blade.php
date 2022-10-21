@extends('layouts.master')

@section('main')
    {{-- table --}}
        <h2 class="mb-3">History Products In</h2>
        
        <div class="card shadow">
            <div class="card-body">

                <a class="btn btn-danger" href={{url('history/in/pdf')}}>
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
                        <th>Modal</th>                       
                    
                    </thead>
                    <tbody>
                        @php $i=1 @endphp
                        @foreach($category as $key => $c)
                            @foreach($c->products as $p)
                                @foreach($p->historyins as $hi)
                                                                        
                                        <tr>
                                            <td>{{ $i++}}</td>
                                            <td>
                                                <img src="{{ $p->image == null ? asset('images/bg/image.png') : asset('/storage/product/'. $p->image) }}" style="height: 170px;width:170px;border-radius:10px;">
                                            </td>
                                            <td>{{ date('d-m-Y h:i', strtotime($hi->created_at))}}</td>
                                            <td>{{ $c->name }}</td>
                                            <td>{{ $p->name }}</td>
                                            <td>{{ $hi->qty }}</td>  
                                            <td>Rp. @money((float)$hi->price)</td>                                                                                                                   
                                        </tr> 

                                    @endforeach
                                @endforeach
                            @endforeach     
                    </tbody>
                </table>
            
            </div>
        </div>
   
@endsection
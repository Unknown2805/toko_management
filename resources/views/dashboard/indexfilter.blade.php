
@extends('layouts.master')
@section('main')
    @hasrole('admin')
        {{--Preview--}}
            <div class="row"> 
                <div class="col-6 col-md-3">
                    @if(!isset($profile[0]->name))
                        <a data-bs-toggle="modal" data-bs-target="#addProfile">                    
                            <div class="card shadow">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="avatar avatar-xl">
                                                <img src="{{ asset('/images/bg/image.png')}}" class="card-img border border-2 border-secondary" alt="..." style="height:60px;width:60px;">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8 mt-2">
                                            <span class="font-bold" style="font-size: 18px">
                                                Profile Toko
                                            </span>                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @else
                        @foreach($profile as $p)
                            <a data-bs-toggle="modal" data-bs-target="#viewProfile{{$p->id}}">               
                                <div class="card shadow">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-12 col-md-4">
                                                <div class="avatar avatar-xl">
                                                    <img src="{{ $p->image == null ? asset('/images/bg/image.png') : asset('/storage/profile/' .$p->image) }}" class="card-img border border-2 border-secondary" alt="..." style="height:60px;width:60px;" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-8 mt-2">
                                                <span class="font-bold" style="font-size: 18px">
                                                    {{ $p->name}}
                                                </span>  
                                            </div>                                                                    
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>

                <div class="col-6 col-md-3">
                    <a data-bs-toggle="modal" data-bs-target="#viewUser{{Auth::user()->id}}">                
                        <div class="card shadow">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ Auth::user()->image == null ? asset('/images/bg/user.jpg') : asset('/storage/user/' .Auth::user()->image) }}" class="card-img border border-2 border-secondary" alt="..." style="height:60px;width:60px;" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-8 mt-2">
                                        <span class="font-bold" style="font-size: 18px">
                                            {{ Auth::user()->name}}
                                        </span>  
                                    </div>                                  
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
    
                <div class="col-6 col-md-3">
                    <div class="card shadow">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="ibi bi-box"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Stock Product</h6>
                                    
                                    <h6 class="font-extrabold mb-0">{{$stock}} products</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card shadow">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="bi-box-arrow-in-up-right"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Sold Product</h6>
                                    
                                    <h6 class="font-extrabold mb-0">{{$sold}} products</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  

        {{-- Chart --}}
            <div class="col-12 col-md-12">
                <div class="card shadow">
                    <div class="card-header">

                            
                            <form action={{ route('dashboard.filter') }} method="POST" >
                                @csrf
                                <div class="row">
                                    <div class="col-3 col-md-4">
                                        <div class="text-start">

                                            <h6>Rekap Penjualan Product</h6>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-5">
                                        <div class="text-end">
                                            <a href="{{ url('/dashboard')}}" class="btn btn-outline-primary w-25">default</a>

                                        </div>
                                    </div>
                                    <div class="col-2 col-md-2">
                                        <div class="text-end">
                                            <input id="datepicker" name="date" class="form-control w-100"/>
                                        </div>
                                    </div>

                                    <div class="col-1 col-md-1">

                                        <button type="submit" class="btn btn-outline-warning w-100">filter</button>
                                    </div>
                                </div>                                    
                            </form>
                    </div>


                    <div class="card-body">

                        <div class="row">


                            <div class="col-12 col-md-12">
                                <div class="text-center">
                                    <canvas id="products_b"></canvas>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </div>

        {{-- Top Ten Product --}}
            <div class="card shadow">
                <div class="card-header">
                    <h6>Top Ten Product</h6>
                </div>    
                <div class="card-body">
            
                    <div class="row">
            
            
                        <div class="col-12 col-sm-12">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category</th>
                                        <th>Barang</th>
                                        <th>Harga</th>
                                        <th>Terjual</th>
                                    </tr>
            
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1 @endphp
                                    @foreach($category as $key => $c)
                                        @foreach($c->products as  $p)
                                            @foreach($p->outs as $o)
                                                
                                                @if($o->qty_k === null)
                                                @else
                                                    <tr>
                                                        <td>{{ $i++}}</td>
                                                        <td>{{ $c->name }}</td>
                                                        <td>{{ $p->name }}</td>
                                                        <td>{{ $o->price_k }}</td>
                                                        <td>{{ $o->qty_k }}</td>
                                                    </tr>
                                                @endif
                                                
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
            
            
                    </div>
            
                </div>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>    
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.min.js"
                    integrity="sha512-dw+7hmxlGiOvY3mCnzrPT5yoUwN/MRjVgYV7HGXqsiXnZeqsw1H9n9lsnnPu4kL2nx2bnrjFcuWK+P3lshekwQ=="
                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- script chart --}}
            <script>
                    // const b_products = [
                    //     'January',
                    //     'February',
                    //     'March',
                    //     'April',
                    //     'May',
                    //     'June',
                    //     'July',
                    //     'Aug',
                    //     'Sep',
                    //     'Oct',
                    //     'Nov',
                    //     'Dec'
                    // ];
                    const b_products = [
                       
                        @for ($i = 1; $i <= $label_m; $i++)
                            {{ $i }},
                        @endfor
                     
                    ];

                    const b_productsd = {
                        labels: b_products,
                        datasets: [{
                            label: 'Netto',
                            backgroundColor: '#43beaf',
                            borderRadius: 4,
                            barThickness: 10,

                            data: [
                                @foreach ($data_month_un_p as $ikm)
                                    {{ $ikm }},
                                @endforeach
                            ]
                        }, {
                            label: 'Loss',
                            backgroundColor: '#dc3545',
                            borderRadius: 4,
                            barThickness: 10,
                            data: [
                                @foreach ($data_month_rug_p as $okm)
                                    {{ $okm }},
                                @endforeach
                            ],
                        }]
                    };

                    const bar_products = {
                        type: 'bar',
                        data: b_productsd,
                        options: {
                            responsive: true,
                            indexAxis: 'x',
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                        usePointStyle: true,
                                    },
                                },
                            },
                        }
                    };
            </script>
            <script>
                    const bulanan_products = new Chart(
                        document.getElementById('products_b'),
                        bar_products
                    );
            </script>

    @endhasrole

    @hasrole('karyawan')

        <div class="row mx-auto d-flex justify-content-center">
            <div class="col-12 col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h5>Sell Products</h5>
                    </div>
                <div class="card-body">                                                                                                                  
                    <a class="btn btn-danger" href={{url('transaction/pdf')}}>
                        <span class="me-1"><i class="bi bi-printer-fill"></i></span>
                        PDF
                    </a>                                                                                                                                                   
                    <table class="table" id="table1">
                        <thead>
                            <th>No</th>
                            <th>Photo</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>                                
                                <div class="d-flex justify-content-center">                                    
                                    Action
                                </div>
                            </th>
                        
                        </thead>
                        <tbody>
                            @php $i=1 @endphp

                                @foreach($category as  $c)
                                    @foreach($c->products as $key => $p)
                                        @foreach($p->outs as $o)
                                                                            
                                        @if($p->qty && $o->price_k !== null)
                                            <tr>    
                                                <td>{{ $i++ }}</td>
                                                <td>
                                                    <img src="{{ $p->image == null ? asset('images/bg/image.png') : asset('/storage/product/'. $p->image) }}" style="height: 170px;width:170px;border-radius:10px;">
                                                </td>
                                                <td>{{ $c->name }}</td>
                                                <td>{{ $p->name }}</td>
                                                <td>{{ $p->qty }}</td>
                                                <td>                                            
                                                    <div class="d-flex justify-content-center">                                                     
                                                        <a class="btn shadow btn-outline-warning btn-md shadow me-2" data-bs-toggle="modal" data-bs-target="#sellProduct{{ $p->id }}">Sell</i></a>   
                                                    </div>
                                                </td>
                                            </tr>  
                                        @elseif($p->qty === 0 && $o->price_k === null )
                                        @endif
                                        @endforeach
                                    @endforeach
                                @endforeach     
                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
            
        </div>
        
    @endhasrole

    @include('dashboard/modalDashboard')
    @include('product/modalProduct')

@endsection



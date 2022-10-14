@extends('layouts.master')

@section('main')

{{-- Profile & User --}}
    <div class="row mb-4"> 
        <div class="d-flex justify-content-between">
            {{-- profile --}}
            @if(!isset($profile[0]->name))
                <a data-bs-toggle="modal" data-bs-target="#addProfile">
                        
                    <div class="text-start">
                        <div class="avatar avatar-xl">
                            <img src="{{ asset('/assets/images/faces/2.jpg')}}">
                        </div>                    
                    </div>

                </a>
            @else
                @foreach($profile as $p)
                    <a data-bs-toggle="modal" data-bs-target="#viewProfile{{ $p->id }}">                    
                        <div class="text-start">
                            <div class="avatar avatar-xl">
                                <img src="{{ $p->image == null ? asset('assets/images/faces/2.jpg') : asset('/storage/profile/' .$p->image) }}" class="card-img" alt="..." style="height:70px;width:70px;" />
                            </div>
                            <span class="font-bold ms-1" style="font-size: 24px">
                                {{ $p->name }}
                            </span>
                        </div>
                    </a>
                @endforeach
            @endif

            {{-- User --}}
            <a data-bs-toggle="modal" data-bs-target="#viewUser{{Auth::user()->id}}">                
                <div class="text-start">
                    <div class="avatar avatar-xl">
                        <img src="{{ Auth::user()->image == null ? asset('assets/images/faces/2.jpg') : asset('/storage/user/' .Auth::user()->image) }}" class="card-img" alt="..." style="height:70px;width:70px;" />
                    </div>
                </div>
            </a>
        </div>          
    </div>  


{{-- Chart --}}
    <div class="col-12 col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <h6>Rekap Penjualan Product</h6>
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
    <div class="card-body">

        <div class="row">


            <div class="col-12 col-sm-12">
                <table class="table table-striped">
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
                        @foreach($category as $key => $c)
                            @foreach($c->products as  $p)
                                @foreach($p->outs as $o)
                                                                    
                                    <tr>
                                        <td>{{ ++$key}}</td>
                                        <td>{{ $c->name }}</td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $o->price_k }}</td>
                                        <td>{{ $o->qty_k }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>

    </div>

@include('dashboard/modalDashboard')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.min.js"
        integrity="sha512-dw+7hmxlGiOvY3mCnzrPT5yoUwN/MRjVgYV7HGXqsiXnZeqsw1H9n9lsnnPu4kL2nx2bnrjFcuWK+P3lshekwQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const b_products = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
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
@endsection


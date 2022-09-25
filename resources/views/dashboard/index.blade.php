@extends('layouts.master')

@section('main')
    <h1 class="mb-3">Ini Dashboard</h1>

    @foreach($category as $c)
        
        
        <div class="row">
                    <h3>{{$c->name}}</h3>
                    <hr>
                    <div class="row">
                            @foreach($c->products as $p)
                            <div class="col-2 col-md-2">
                                <div class="card card-sm">
                                        <div class="text-center">
            
                                            <img src="{{ $p->image == null ? asset('assets/images/samples/banana.jpg') : asset('/storage/product/'. $p->image) }}" class="card-img"  height="150px">
                                        </div>
            
                                    <div class="card-body">
                                        <h6>{{$p->name}}</h6>
                                        <p>Rp. @money((float)$p->price)</p>
            
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                
                
    @endforeach


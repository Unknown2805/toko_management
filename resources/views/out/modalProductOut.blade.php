    @foreach($category as $c)
        @foreach ($c->products as $p)
            
        <div class="modal fade" id="addProductOut{{$p ->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Price Out</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action={{url('product/out/add/' . $p->id)}} method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                            <div class="col-12 col-md-12 mb-4">
                                <div class="row">
                                    <div class="col-6 col-md-6">
                                        <img src="{{ $p->image == null ? asset('assets/images/samples/image_default.jpg') : asset('/storage/product/'. $p->image) }}" style="height: 150px;width:150px;border-radius:150px;">
                                    </div>
                                    <div class="col-6 col-md-6">
                                        
                                        <div class="text-center mb-5">
                                            <label for="formGroupExampleInput2" class="form-label">Price Product Out</label>
                                            
                                            <input type="text" class="form-control" placeholder="Price" name="price_k" value="{{$p->price}}" autocomplete="off" onkeyup="formatbaru(event)">
                                        </div>
                                        <input type="hidden" class="form-control"  name="product_id" value="{{$p->id}}" autocomplete="off">

                                        <div class="text-center">

                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                            
                </div>
            </div>
        </div>
        @endforeach
    @endforeach


    @foreach($category as $c)
        @foreach ($c->products as $p)
            @foreach ($p->outs as $o)
                <div class="modal fade" id="buyProduct{{$o->product_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Quantity Out</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                                <div class="modal-body ms-1 me-1">
                                    <form action={{url('product/out/buy/' . $o->id)}} method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                            <div class="col-12 col-md-12 mb-4">
                                                <div class="row">
                                                    <div class="col-6 col-md-6">
                                                        <img src="{{ $p->image == null ? asset('assets/images/samples/image_default.jpg') : asset('/storage/product/'. $p->image) }}" style="height: 150px;width:150px;border-radius:150px;">
                                                    </div>
                                                    <div class="col-6 col-md-6">
                                                        
                                                        <div class="text-center mb-5">
                                                            <label for="formGroupExampleInput2" class="form-label">Quantity Product</label>
                                                            
                                                            <input type="number" class="form-control" max="{{$p->qty}}" placeholder="Quantity Out" name="qty_k"  autocomplete="off">
                                                        </div>
                                                        <input type="hidden" class="form-control"  name="product_id" value="{{$p->id}}" autocomplete="off">

                                                        <div class="text-center">

                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                    


                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    @endforeach

    @foreach($category as $c)
        @foreach ($c->products as $p)
            @foreach ($p->outs as $o)
                <div class="modal fade" id="editPriceProduct{{$o->product_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Price Out</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                                <div class="modal-body ms-1 me-1">
                                    <form action={{url('product/out/edit/price/' . $o->id)}} method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                            <div class="col-12 col-md-12 mb-4">
                                                <div class="row">
                                                    <div class="col-6 col-md-6">
                                                        <img src="{{ $p->image == null ? asset('assets/images/samples/image_default.jpg') : asset('/storage/product/'. $p->image) }}" style="height: 150px;width:150px;border-radius:150px;">
                                                    </div>
                                                    <div class="col-6 col-md-6">
                                                        
                                                        <div class="text-center mb-5">
                                                            <label for="formGroupExampleInput2" class="form-label">Price Product Out</label>
                                                            
                                                            <input type="text" class="form-control" value="{{$o->price_k}}" placeholder="Price Product" name="price_k" autocomplete="off" onkeyup="formatbaru(event)">
                                                        </div>
                                                        <input type="hidden" class="form-control"  name="product_id" value="{{$p->id}}" autocomplete="off">

                                                        <div class="text-center">

                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    @endforeach

{{-- add product --}}
    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{url('product/add/')}} method="POST" enctype="multipart/form-data">
                    @csrf
                
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-8 col-md-8">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Name Product</label>
                                
                                    <input type="name" class="form-control" placeholder="Name Product" name="name" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-4 col-md-4">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Quantity Product</label>
                                
                                    <input type="number" class="form-control" placeholder="Add Quantity" name="qty" autocomplete="off">
                                </div>                        
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8 col-md-8">
                                <div class="mb-3">
                                    
                                    <label>Categories</label>
                                    <div class="form-group">
                                        <select class="choices form-select" aria-label="Default select example" name="category_id">
                                            @foreach ($category as $c)                                            
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                            @endforeach    
                                        </select>
                                    </div>
                                
                                </div>     
                            </div>
                            <div class="col-4 col-md-4">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Price Product</label>
                                
                                    <input type="text" class="form-control" placeholder="Price Product" name="price" autocomplete="off" onkeyup="formatbaru(event)">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Description Product</label>
                        
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>                    </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Photo Product</label>
                        
                            <input type="file" class="form-control" placeholder="Photo" name="image" autocomplete="off">
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{-- detail product(edit) --}}
    @foreach($category as $c)
        @foreach ($c->products as $p)
            @foreach ($p->outs as $o)
                
            <div class="modal fade" id="detailProduct{{$p ->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Detail Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action={{url('product/edit/' . $p ->id)}} method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="col-12 col-md-12 mb-4">
                                    <div class="d-flex justify-content-center">
                                        <img src="{{ $p->image == null ? asset('images/bg/image.png') : asset('/storage/product/'. $p->image) }}" style="height: 150px;width:150px;border-radius:150px;">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">Name Product</label>
                                            
                                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{$p->name}}" autocomplete="off">
                                        </div>
                                    </div>
                                    

                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-6 col-md-6">

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">Quantity Product</label>
                                            
                                            <input type="number" min="1" class="form-control" placeholder="Quantity" name="qty" value="{{$p->qty}}" autocomplete="off">
                                        </div>
                                
                                    </div>
                                    <div class="col-6 col-md-6">

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">Categories</label>
        
                                            <div class="form-group">
                                                <select class="choices form-select" aria-label="Default select example" name="category_id">
                                                    @foreach ($category as $c)                                            
                                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                                    @endforeach    
                                                </select>
                                            </div>
                                        </div>    
        
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6 col-md-6">

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">Modal Product</label>
                                            
                                            <input type="text" class="form-control" placeholder="Modal Product" name="price" value="{{$p->price}}" autocomplete="off" onkeyup="formatbaru(event)">
                                        </div>
                                
                                    </div>
                                    <div class="col-6 col-md-6">

                                        @if($o->price_k == null)

                                            <label for="formGroupExampleInput2" class="form-label">Price Product</label>

                                            <input type="text" class="form-control" placeholder="no prices yet" autocomplete="off" onkeyup="formatbaru(event)" disabled>

                                        @else

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">Price Product</label>
                                            
                                            <input type="text" class="form-control" placeholder="Name" name="price_k" value="{{$o->price_k}}" autocomplete="off" onkeyup="formatbaru(event)">
                                        </div>
                                        @endif
                                        
                                    </div>
                                </div>

                                

                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Description Product</label>
                                    
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="desc">{{$p->desc}}</textarea>
                                </div>

                                
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Photo Product</label>
                                    <input type="file" class="form-control" placeholder="Photo" name="image" autocomplete="off">
                                </div>

                                <input type="hidden" name="product_id" value="{{$p->id}}">
                            <hr>


                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @endforeach
        @endforeach
    @endforeach

{{-- add price product --}}
    @foreach($category as $c)
        @foreach ($c->products as $p)
            @foreach ($p->outs as $o)
                
            <div class="modal fade" id="addPrice{{$o ->product_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Price Out Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action={{url('/product/out/add/' . $o ->id)}} method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Price Product</label>
                                    
                                    <input type="text" class="form-control" placeholder="Add Price" name="price_k" autocomplete="off" onkeyup="formatbaru(event)">
                                </div>           
                                <input type="hidden" class="form-control"  name="product_id" value="{{$p->id}}" autocomplete="off" onkeyup="formatbaru(event)">
                 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save changes</button>
                            </div>     
                        </form>

                    </div>
                </div>
            </div>

            @endforeach
        @endforeach
    @endforeach

{{-- sell product --}}
    @foreach($category as $c)
        @foreach ($c->products as $p)
            @foreach ($p->outs as $o)
                
            <div class="modal fade" id="sellProduct{{$o ->product_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sell Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action={{url('/product/out/sell/' . $o ->id)}} method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Quantity Product</label>
                                    
                                    <input type="number" max="{{$p->qty}}" class="form-control" placeholder="Add Quantity" name="qty_k" autocomplete="off">
                                </div>           
                                <input type="hidden" class="form-control"  name="product_id" value="{{$p->id}}" autocomplete="off">
                 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save changes</button>
                            </div>     
                        </form>

                    </div>
                </div>
            </div>

            @endforeach
        @endforeach
    @endforeach

    
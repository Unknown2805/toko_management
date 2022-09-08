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
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Name Product</label>
                            
                                <input type="name" class="form-control" placeholder="Name Product" name="name" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Quantity Product</label>
                            
                                <input type="number" class="form-control" placeholder="Add Quantity" name="qty" autocomplete="off">
                            </div>                        
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Price Product</label>
                            
                                <input type="text" class="form-control" placeholder="Price Product" name="price" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Supplier</label>

                                <select class="form-select" aria-label="Default select example" name="supplier_id">
                                    @foreach ($supplier as $s)     
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
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

@foreach ($supplier as $s)
    @foreach($s->products as $p)
        <div class="modal fade" id="editProduct{{$p ->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action={{url('product/edit/' . $p ->id)}} method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="col-12 col-md-12 mb-4">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ $s->image == null ? asset('assets/images/samples/banana.jpg') : asset('/storage/product/'. $p->image) }}" style="height: 150px;width:150px;border-radius:150px;">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Name Product</label>
                                        
                                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{$p->name}}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Quantity Product</label>
                                        
                                        <input type="number" class="form-control" placeholder="Name" name="qty" value="{{$p->qty}}" autocomplete="off">
                                    </div>
                                </div>
                                                      
                            </div>
                            
                            <div class="row">
                                <div class="col-6 col-md-6">

                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Price Product</label>
                                        
                                        <input type="text" class="form-control" placeholder="Name" name="price" value="{{$p->price}}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Supplier</label>
    
                                        <select class="form-select" aria-label="Default select example" name="supplier_id">
                                            @foreach ($supplier as $s)     
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
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
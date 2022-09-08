<div class="modal fade" id="addSupp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action={{url('supplier/add/')}} method="POST" enctype="multipart/form-data">
                @csrf
               
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Name</label>
                            
                                <input type="name" class="form-control" placeholder="Name" name="name" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Address</label>
                            
                                <input type="text" class="form-control" placeholder="Address" name="address" autocomplete="off">
                            </div>                        
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Email</label>
                    
                        <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Photo</label>
                    
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
    <div class="modal fade" id="editSupp{{$s ->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{url('supplier/edit/' . $s ->id)}} method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="col-12 col-md-12 mb-4">
                            <div class="d-flex justify-content-center">
                                <img src="{{ $s->image == null ? asset('assets/images/samples/bg-mountain.jpg') : asset('/storage/supplier/'. $s->image) }}" style="height: 150px;width:150px;border-radius:150px;">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Name</label>
                                    
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{$s->name}}" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Address</label>
                                    
                                    <input type="text" class="form-control" placeholder="Address" name="address" value="{{$s->address}}" autocomplete="off">
                                </div>
                            </div>                            
                        </div>
                        
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Email</label>
                            
                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{$s->email}}" autocomplete="off">
                        </div>
                        
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Photo</label>
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

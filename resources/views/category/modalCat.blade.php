{{-- add category --}}
    <div class="modal fade" id="addCat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{url('category/add/')}} method="POST" enctype="multipart/form-data">
                    @csrf
                
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Name</label>
                        
                            <input type="text" class="form-control" placeholder="Name" name="name" autocomplete="off" autofocus>
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
{{-- edit category --}}
    @foreach ($category as $c)
        <div class="modal fade" id="editCat{{$c->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action={{url('category/edit/' . $c->id)}} method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Category name</label>
                                
                                <input type="text" class="form-control" placeholder="Category name" name="name" value="{{$c->name}}" autocomplete="off">
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

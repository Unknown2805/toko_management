{{-- Add Profile --}}
    <div class="modal fade" id="addProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="text-center mt-3">
                        Add Profile
                </div>
                <form action={{url('dashboard/add/profile')}} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Name Profile</label>
                        
                            <input type="text" class="form-control" placeholder="Name Profile" name="name" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Address Profile</label>
                            
                            <input type="name" class="form-control" placeholder="Address Profile" name="address" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Photo Profile</label>
                        
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

{{-- View Profile --}}
    @foreach($profile as $p)

        <div class="modal fade" id="viewProfile{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                <div class="text-center mt-3">
                </div>
                
                <div class="modal-body">
                    <div class="text-center">

                        <div class="avatar avatar-lg">

                            <img src="{{ $p->image == null ? asset('images/bg/image.png') : asset('/storage/profile/' .$p->image) }}" class="card-img" alt="..." style="height:80px;width:80px;" />
                        </div>

                    </div>
                    <div class="text-center mb-3 mt-3">
                        
                        <h5>{{$p->name}}</h5>
                        <hr>
                        <p>{{$p->address}}</p>
                        {{-- <p>{{$p->telepon}}</p> --}}

                    </div>
                    <div class="text-center mb-3 mt-3">
                        <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editProfile{{ $p->id }}">Edit</i></a>
                    </div>
                    
                    
                    
                </div>
                </div>
            </div>
        </div>

    @endforeach

{{-- Edit Profile --}}

    @foreach ($profile as $p)

        <div class="modal fade" id="editProfile{{$p ->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action={{url('/dashboard/edit/profile/' . $p->id)}} method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Name Profile</label>
                                <input type="text" class="form-control" value="{{$p->name}}" id="formGroupExampleInput" placeholder="Change name Profile" name="name">
                            </div>
                            
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Photo Profile</label>
                                    <div class="col-md-8 mb-3">
                                        <img src="{{ $p->image == null ? asset('images/bg/image.png') : asset('/storage/profile/' .$p->image) }}" class="card-img" alt="..." style="height:180px;border-radius:15px"/>
                                    </div>
                                <input type="file" class="form-control" name="image" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Address Profile</label>
                                <input type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder="Alamat" name="address" value="{{$p->address}}">
                            </div>                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endforeach

{{-- View User --}}
    <div class="modal fade" id="viewUser{{Auth::user()->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <div class="text-center mt-3">
            </div>
            
            <div class="modal-body">
                <div class="text-center">

                    <div class="avatar avatar-xl">

                        <img src="{{ Auth::user()->image == null ? asset('images/bg/user.jpg') : asset('/storage/user/' .Auth::user()->image) }}" class="card-img" alt="..." style="height:80px;width:80px;" />
                    </div>

                </div>
                <div class="text-center mb-3 mt-3">
                    
                    <h5>{{Auth::user()->name}}</h5>
                    <hr>
                    <p>{{Auth::user()->email}}</p>
                    {{-- <p>{{Auth::user()->telepon}}</p> --}}

                </div>
                <div class="text-center mb-3 mt-3">
                    <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editUser{{ Auth::user()->id }}">Edit</i></a>
                </div>
                
                
                
            </div>
            </div>
        </div>
    </div>

{{-- Edit User(gambar) --}}

        <div class="modal fade" id="editUser{{Auth::user()->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action={{url('/dashboard/edit/user/' . Auth::user()->id)}} method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Name</label>
                                <input type="text" class="form-control" value="{{Auth::user()->name}}" id="formGroupExampleInput" placeholder="Change name Profile" name="name">
                            </div>
                            
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Email</label>
                                <input type="email" class="form-control" id="formGroupExampleInput"
                                    placeholder="email" value="{{Auth::user()->email}}" name="email">
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Photo Profile</label>
                                    <div class="col-md-8 mb-3">
                                        <img src="{{ Auth::user()->image == null ? asset('images/bg/user.jpg') : asset('/storage/user/' .Auth::user()->image) }}" class="card-img" alt="..." style="height:180px;border-radius:15px"/>
                                    </div>
                                <input type="file" class="form-control" name="image" autocomplete="off">
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    

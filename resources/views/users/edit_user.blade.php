<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{'#edit-user-'.$user->id}}">
 Edit
</button>

                            <!-- Modal -->
<div class="modal fade" id="{{'edit-user-'.$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:600px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Edit User - {{$user->email}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('users.edit') }}" method="POST" id="edit-user-form">
                                <div class="modal-body">
                                   




                                <div class="row">
                    <div class="col-md-12">
                        
                   
                        {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name*</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder="Enter Name" required>
                        <input type="text" hidden name="user_id" value="{{$user->id}}"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address*</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" aria-describedby="emailHelp" placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="role">User Role*</label>
                        <select class="form-control" id="role" name="role" required>
                            @foreach($roles as $role)
                                @if($user->role == $role->id)
                                <option selected value="{{$role->id}}">{{$role->role_name}}</option>
                                @else
                                <option value="{{$role->id}}">{{$role->role_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                   
                    </div>
                </div>







                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                </div>
                                </form>
                                </div>
                            </div>
                            </div>
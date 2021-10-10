@extends('layouts.app')

@section('content')
    <div class="container-fluid"><br/><br/>
        <div class="card">
            <div class="card-header">
                <h3>New User</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @include('common.alerts')
                    <form action="{{ route('users.new') }}" method="POST" id="create-user-form">
                        {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name*</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address*</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password" required>Password*</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="role">User Role*</label>
                        <select class="form-control" id="role" name="role" required>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->role_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info btn-sm">Create User</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

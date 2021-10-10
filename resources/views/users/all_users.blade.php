@extends('layouts.app')

@section('content')
    <div class="container-fluid"><br/><br/>
        <div class="card">
            <div class="card-header">
                <h3>Registered Users</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <form class="search-form" action="{{route('users.registered')}}" method="GET">
                        <div class="row">                            
                            <div class="col-md-10">
                                 <input type="text" class="form-control" name="search_key" id="search_key" value="{{$search_key}}" placeholder="Name / Email"/>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success" type="submit">Search</button>
                            </div>
                            
                        </div>
                        </form>
                    </div>
                </div><br/><br/>
                <div class="row">
                    <div class="col-md-12">
                    @include('common.alerts')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                       @foreach($users as $user)
                       <tr>
                        <th scope="row">{{$count}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <span class="badge badge-danger">
                            @if($user->role == 1)
                            User
                            @elseif($user->role == 2)
                            Admin
                            @endif
                            </span>
                        </td>
                        <td>
                            @include('users.edit_user')
                            @if(Auth::user()->id != $user->id)
                            @include('users.delete_user')
                            @endif
                        </td>
                      </tr>
                        @php
                            $count++;
                        @endphp
                       @endforeach
                    </tbody>
                    </table>
                    <br/> 
                    
                    <div class="row">
                        <div class="col-md-12">
                        {{$users->links()}}
                        </div>
                    </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container-fluid"><br/><br/>
        <div class="card">
            <div class="card-header">
                <h3>All Post Categories</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                    @include('post_categories.new_category')
                    </div>
                    <div class="col-md-6">
                        <form class="search-form" action="{{route('categories.all')}}" method="GET">
                        <div class="row">                            
                            <div class="col-md-10">
                                 <input type="text" class="form-control" name="search_key" id="search_key" value="{{$search_key}}" placeholder="Category Name"/>
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
                        <th scope="col">Category Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                       @foreach($categories as $category)
                       <tr>
                        <th scope="row">{{$count}}</th>
                        <td>{{$category->category_name}}</td>                        
                        <td>{{$category->description}}</td>
                        <td>
                            @include('post_categories.edit_category')
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
                        {{$categories->links()}}
                        </div>
                    </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

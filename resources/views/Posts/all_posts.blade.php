@extends('layouts.app')

@section('content')
    <div class="container-fluid"><br/><br/>
        <div class="card">
            <div class="card-header">
                <h3>All Posts</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <form class="search-form" action="{{route('posts.all')}}" method="GET">
                        <div class="row">                            
                            <div class="col-md-10">
                                 <input type="text" class="form-control" name="search_key" id="search_key" value="{{$search_key}}" placeholder="Post Title"/>
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
                        <th scope="col">Post Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Category</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                       @foreach($posts as $post)
                       <tr>
                        <th scope="row">{{$count}}</th>
                        <td>{{$post->title}}</td>
                        
                        <td>
                            <span class="badge badge-danger">
                            @if($post->status == 0)
                            Unpublished
                            @elseif($post->status == 1)
                            Published
                            @endif
                            </span>
                        </td>
                        <td>
                            @if($post->category_id != null)
                            {{$post->category->category_name}}
                            @else
                            N/A
                            @endif
                        </td>
                        <td>{{$post->created_at}}</td>
                        <td>
                            @include('posts.edit_post')
                            <a href="{{url('/posts/comments/'.$post->id)}}"><button type="button" class="btn btn-secondary btn-sm">Comments</button></a>
                            @include('posts.delete_post')
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
                        {{$posts->links()}}
                        </div>
                    </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

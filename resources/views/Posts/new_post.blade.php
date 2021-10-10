@extends('layouts.app')

@section('content')
    <div class="container-fluid"><br/><br/>
        <div class="card">
            <div class="card-header">
                <h3>New Post</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @include('common.alerts')
                    <form action="{{ route('posts.new') }}" method="POST" id="create-user-form">
                        {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Title*</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group">
                        <label for="tiny">Your Post*</label>
                        
                        <textarea class="tiny" id="tiny" name="body"></textarea>
					</textarea>
                        
                    </div>  
                    <div class="form-group">
                        <label for="category_id">Category*</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>                  
                    <div class="form-group">
                        <label for="status">Status*</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="0">Unpublished</option>
                            <option value="1">Published</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info btn-sm">Create Post</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

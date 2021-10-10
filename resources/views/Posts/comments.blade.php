@extends('layouts.app')

@section('content')
    <div class="container-fluid"><br/><br/>
        <div class="card">
            <div class="card-header">
                <h3>Comments For The Post - {{$post->title}}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @include('common.alerts')
                    <div class="row">
                        <div class="col-md-12">
                        @if(sizeof($post->comments) == 0)
                        No comments yet.
                        @else
                        
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Commented On</th>
                            <th scope="col" style="width:70%;">Comment</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $count = 1;
                        @endphp

                        @foreach($post->comments as $comment)
                        <tr>
                            <td>{{$count}}</td>
                            <td>
                                {{$comment->created_at}}<br/>
                                <small>
                                    <b>
                                    by
                                    @if($comment->user_id != null)
                                    {{$comment->user->name}}
                                    @else
                                    Guest
                                    @endif
                                    </b>
                                </small>
                            </td>
                            <td>{{$comment->comment}}</td>
                            <td>
                                @if(Auth::user()->id == $comment->user_id)
                                @include('posts.edit_comment')
                                @endif
                                @include('posts.delete_comment')
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                        @endforeach
                        
                        <tbody>
                        </table>
                        @endif

                        <hr/>
                        <form action="{{ route('posts.comment') }}" method="POST" id="edit-post-form">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Comment</label>
                                <input type="text" class="form-control" id="comment" name="comment" placeholder="Add comment" required>
                                <input type="text" name="post_id" value="{{$post->id}}" hidden/>
                            </div>
                            <button type="submit" class="btn btn-info btn-sm">Add Comment</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

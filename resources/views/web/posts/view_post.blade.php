@extends('web.web_layout.web_app')

@section('web_content')
<div class="card">
  <h5 class="card-header">{{$post->title}} by - {{$post->user->name}}<br/><br/>
  <p class="card-text" style="font-size:9pt;"><small><b>Posted on - {{$post->created_at}}</b></small></p></h5>
  
  <div class="card-body">
    <h5 class="card-title"><br>Category - {{$post->category->category_name}}</br></h5>
    <p class="card-text" id="post-content">{!! $post->body !!}</p>

    <hr/>
    <h5 class="card-title"><br>Comments</br></h5>
    <hr/>
    <div class="comments-list">
          @foreach($post->comments as $comment)
                            <div class="media">                          
                            <a class="media-left" href="#">
                              <img style="width:30px;" src="{{url('/images/comment_pic.png')}}">
                            </a>
                            <div class="media-body">
                                
                              <h5 class="media-heading user_name">{{$comment->username}}</h5>
                              {{$comment->comment}}
                              
                              <p style="font-size:9pt;"><small>Commented on - {{$comment->created_at}}</small></p>
                            </div>
                          </div>
          @endforeach             
                      
                      
    </div>
    <hr/>
    <form action="{{ route('posts.comment') }}" method="POST" id="edit-post-form">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Your Name*</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Your Name" required>
        </div>
        <div class="form-group">
            <label for="name">Comment*</label>
                <input type="text" class="form-control" id="comment" name="comment" placeholder="Add comment" required>
                <input type="text" name="post_id" value="{{$post->id}}" hidden/>
        </div>
        <button type="submit" class="btn btn-info btn-sm">Add Comment</button>
    </form>
  </div>
</div>
@endsection

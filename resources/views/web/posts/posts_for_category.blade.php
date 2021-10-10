@extends('web.web_layout.web_app')

@section('web_content')
<div class="row">
    <div class="col-md-12">
        <h3>Posts For {{$category->category_name}} Category</h3><hr/>
    </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="row">
      @foreach($posts as $post)

        <div class="col-md-3" style="margin-bottom:20px;">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">Category - {{$post->category->category_name}}</p>
            <p class="card-text"><small><b>Author - {{$post->user->name}}</b></small></p>
            <p class="card-text" style="font-size:9pt;"><small><b>Posted on - {{$post->created_at}}</b></small></p>
            <a href="{{url('posts/read/'.$post->id)}}" class="btn btn-primary">Read Post</a>
           
          </div>
        </div>

        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection

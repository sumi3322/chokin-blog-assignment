<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{'#edit-post-'.$post->id}}">
 Edit
</button>

                            <!-- Modal -->
<div class="modal fade" id="{{'edit-post-'.$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:1000px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Edit Post - {{$post->title}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('posts.edit') }}" method="POST" id="edit-post-form">
                                <div class="modal-body">
                                   




                                <div class="row">
                    <div class="col-md-12">
                        
                   
                        {{csrf_field()}}
                        <div class="form-group">
                        <label for="name">Title*</label>
                        <input type="text" class="form-control" id="title" value="{{$post->title}}" name="title" placeholder="Enter Title" required>
                        <input type="text" name="post_id" value="{{$post->id}}" hidden/>
                    </div>
                    <div class="form-group">
                        <label for="summernote">Your Post*</label>
                        
                        <textarea class="tiny" id="{{'tiny'.$post->id}}" name="body" >{{$post->body}}</textarea>
                     
					</textarea>
                        
                    </div> 
                    <div class="form-group">
                        <label for="category_id">Category*</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            @foreach($categories as $category)
                               @if($category->id == $post->category_id)
                               <option selected value="{{$category->id}}">{{$category->category_name}}</option>
                               @else
                               <option value="{{$category->id}}">{{$category->category_name}}</option>
                               @endif
                            @endforeach
                        </select>
                    </div>                     
                    <div class="form-group">
                        <label for="status">Status*</label>
                        <select class="form-control" id="status" name="status" required>
                           @if($post->status == 0)
                           <option selected value="0">Unpublished</option> 
                           <option value="1">Published</option>                           
                           @else
                           <option selected value="1">Published</option>
                           <option value="0">Unpublished</option> 
                           @endif
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

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{'#edit-comment'.$comment->id}}">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="{{'edit-comment'.$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('posts.commentEdit') }}" method="POST" id="edit-comment-form">
      <div class="modal-body">
               
                        {{csrf_field()}}
                    <div class="form-group">
                        <label for="category_name">Comment*</label>
                        <input type="text" class="form-control" id="comment" name="comment" value="{{$comment->comment}}" placeholder="Comment" required>
                        <input type="text" id="comment_id" name="comment_id" value="{{$comment->id}}" hidden>
                    </div>               
                   
                   
                  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info btn-sm">Save Changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
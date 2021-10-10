<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="{{'#delete-comment'.$comment->id}}">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="{{'delete-comment'.$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this comment ?
      </div>
      <div class="modal-footer">
      <a href="{{url('/posts/comments/delete/'.$comment->id)}}"> <button type="button" class="btn btn-primary btn-sm">Yes</button></a>
       <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
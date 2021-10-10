<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{'#new-category'.$category->id}}">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="{{'new-category'.$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Post Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('categories.edit') }}" method="POST" id="create-category-form">
      <div class="modal-body">
               
                        {{csrf_field()}}
                    <div class="form-group">
                        <label for="category_name">Category Name*</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" value="{{$category->category_name}}" placeholder="Category Name" required>
                        <input type="text" id="category_id" name="category_id" value="{{$category->id}}" hidden>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{$category->description}}" placeholder="Description">
                        
                    </div>
                   
                   
                  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info btn-sm">Update Category</button>
      </div>
      </form>
    </div>
  </div>
</div>
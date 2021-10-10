@if(session()->has('success'))
<div class="alert alert-success alert-dismissible">
  <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
  {{ session()->get('success') }}
</div>
@endif
@if(session()->has('danger'))
<div class="alert alert-danger alert-dismissible" role="alert">
<button class="close" data-dismiss="alert" aria-label="close">&times;</button>
{{ session()->get('danger') }}
</div>
@endif
@if(session()->has('warning'))
<div class="alert alert-warning alert-dismissible" role="alert">
<button class="close" data-dismiss="alert" aria-label="close">&times;</button>
{{ session()->get('warning') }}
</div>
@endif
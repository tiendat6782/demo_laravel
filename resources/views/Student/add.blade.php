@extends('templates.layout')
@section('content')
<form action="{{ route('route_student_add') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Enter name">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label class="col-md-3 col-sm-4 control-label">Ảnh CMND/CCCD</label>
      <div class="col-md-9 col-sm-8">
          <div class="row">
              <div class="col-xs-6">
                  <img id="mat_truoc_preview" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                       style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                  <input type="file" name="image" accept="image/*"
                         class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
                  <label for="cmt_truoc">Mặt trước</label><br/>
              </div>
          </div>
      </div>
</div>
    
    {{-- <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <textarea class="form-control" name="address" rows="3" placeholder="Enter address"></textarea>
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Date òf birth</label>
        <input type="text" class="form-control" name="date" placeholder="Enter date">
      </div> --}}
    <button type="submit" class="btn btn-primary">Add Student</button>
  </form>




@endsection
@section('script')
<script>
  $(function(){
      function readURL(input, selector) {
          if (input.files && input.files[0]) {
              let reader = new FileReader();

              reader.onload = function (e) {
                  $(selector).attr('src', e.target.result);
              };

              reader.readAsDataURL(input.files[0]);
          }
      }
      $("#cmt_truoc").change(function () {
          readURL(this, '#mat_truoc_preview');
      });

  });
</script>
@endsection

@extends('cms.parent')

@section('title' , 'Edit Slider')

@section('main-title' , 'Edit Slider')

@section('sub-title' , 'Edit Slider')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit slider</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="title">slider Title </label>
                    <input type="text" class="form-control" name="title"
                    value="{{ $sliders->title }}" id="title" placeholder="Enter slider Title">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image" placeholder="Enter Image of Admin">
                  </div>
                  <div class="form-group col-md-12">
                      <label for="description"> Description of Slider</label>
                          <textarea class="form-control" style="resize: none;" id="description" name="description" rows="4"
                          placeholder="Enter Description of Slider " cols="50">{{ $sliders->description }}</textarea>
                  </div>
                  
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button onclick="performUpdate({{ $sliders->id }})" type="button" class="btn btn-primary">Store</button>
                <a href="{{route('sliders.index')}}" type="button" class="btn btn-info">GO BACK</a>

              </div>
            </form>
          </div>

        </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('scripts')

<script>

function performUpdate(id){
    let formData = new FormData();
    formData.append('title',document.getElementById('title').value);
    formData.append('description',document.getElementById('description').value);
    formData.append('image',document.getElementById('image').files[0]);

   storeRoute('/cms/admin/sliders-update/' + id , formData);

}

</script>

@endsection


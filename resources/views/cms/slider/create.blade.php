
@extends('cms.parent')

@section('title' , 'Create Slider')

@section('main-title' , 'Create Slider')

@section('sub-title' , 'Create Slider')

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
              <h3 class="card-title">Create slider</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="title">slider Title </label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter slider Title">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image" placeholder="Enter Image of Admin">
                  </div>
                  <div class="form-group col-md-12">
                      <label for="description"> Description of Slider</label>
                          <textarea class="form-control" style="resize: none;" id="description" name="description" rows="4"
                          placeholder="Enter Description of Slider " cols="50"></textarea>
                  </div>
                  
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button onclick="performStore()" type="button" class="btn btn-primary">Store</button>
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

function performStore(){
    let formData = new FormData();
    formData.append('title',document.getElementById('title').value);
    formData.append('description',document.getElementById('description').value);
    formData.append('image',document.getElementById('image').files[0]);

   store('/cms/admin/sliders' , formData);

}

</script>

@endsection

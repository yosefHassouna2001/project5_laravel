
@extends('cms.parent')

@section('title' , 'Create Article')

@section('main-title' , 'Create Article')

@section('sub-title' , 'Create Article')

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
              <h3 class="card-title">Create Article</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">

                <div class="row">
                    <div class="form-group col-md-6">
                      <label>Category</label>
                      <select class="form-control select2" id="category_id" name="category_id" style="width: 100%;">
                        {{-- <option selected="selected">Alabama</option> --}}
                       @foreach ($categories as $category )
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                       @endforeach

                      </select>
                    </div>

                    <input type="text" name="author_id" id="author_id" value="{{ $id}}"
                    class="form-control form-control-solid" hidden/>

                    <div class="form-group col-md-6">
                      <label for="title">Article Name </label>
                      <input type="text" class="form-control" name="title" id="title" placeholder="Enter Article Name">
                    </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="image">Choose Image </label>
                    <input type="file" class="form-control" name="image" id="image" placeholder="Enter Article Name">
                  </div>
                </div>
                <div class="row">

                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="short_description">Short Description of Article</label>
                            <textarea class="form-control" style="resize: none;" id="short_description" name="short_description" rows="4"
                            placeholder="Enter Description of Article " cols="50"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">

                    <div class="col-md-12">
                      <div class="form-group">
                          <label for="full_description">Full Description of Article</label>
                              <textarea class="form-control" style="resize: none;" id="full_description" name="full_description" rows="4"
                              placeholder="Enter Description of Article " cols="50"></textarea>
                      </div>
                    </div>
                </div>
              </div>


            </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button onclick="performStore()" type="button" class="btn btn-primary">Store</button>
                <a href="{{route('indexArticle' , $id)}}" type="button" class="btn btn-info">GO BACK</a>

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
    formData.append('image',document.getElementById('image').files[0]);
    formData.append('short_description',document.getElementById('short_description').value);
    formData.append('full_description',document.getElementById('full_description').value);
    formData.append('author_id',document.getElementById('author_id').value);
    formData.append('category_id',document.getElementById('category_id').value);

   store('/cms/admin/articles' , formData);

}

</script>

@endsection

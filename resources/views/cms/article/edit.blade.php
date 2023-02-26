
@extends('cms.parent')

@section('title' , 'Edit Article')

@section('main-title' , 'Edit Article')

@section('sub-title' , 'Edit Article')

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
              <h3 class="card-title">Edit Article</h3>
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

                       <option @if ($category->id == $articles->category_id) selected @endif value="{{ $category->id }}">
                        {{ $category->name }}</option>

                       @endforeach

                      </select>
                    </div>

                    <div class="form-group col-md-6">
                          <label>Author</label>
                          <select class="form-control select2" id="author_id" name="author_id" style="width: 100%;">
                            {{-- <option selected="selected">Alabama</option> --}}
                           @foreach ($authors as $author )

                           <option @if ($author->id == $articles->author_id) selected @endif value="{{ $author->id }}">
                            {{ $author->email }}</option>

                           @endforeach

                          </select>
                        </div>
                    </div>

                <div class="row">

                <div class="form-group col-md-6">
                  <label for="title">Article Name </label>
                  <input type="text" class="form-control" name="title" id="title"
                  value="{{$articles->title}}" placeholder="Enter Article Name">
                </div>

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
                          placeholder="Enter Description of Article " cols="50">{{$articles->short_description}}</textarea>
                  </div>
                </div>

                <div class="row">

                    <div class="col-md-12">
                         <div class="form-group">
                             <label for="full_description">Full Description of Article</label>
                                 <textarea class="form-control" style="resize: none;" id="full_description" name="full_description" rows="4"
                                 placeholder="Enter Description of Article " cols="50">{{$articles->full_description}}</textarea>
                         </div>
                       </div>
              </div>
            </div>

        </div>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button onclick="performUpdate({{$articles->id}})" type="button" class="btn btn-primary">Update</button>
                <a href="{{route('articles.index')}}" type="button" class="btn btn-info">GO BACK</a>

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
    formData.append('short_description',document.getElementById('short_description').value);
    formData.append('full_description',document.getElementById('full_description').value);
    formData.append('author_id',document.getElementById('author_id').value);
    formData.append('category_id',document.getElementById('category_id').value);
    formData.append('image',document.getElementById('image').files[0]);

   storeRoute('/cms/admin/articles-update/'+id , formData);

}

</script>

@endsection

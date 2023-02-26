
@extends('cms.parent')

@section('title' , 'Show Article')

@section('main-title' , 'Show Article')

@section('sub-title' , 'Show Article')

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
              <h3 class="card-title">Show Article</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">

                <div class="row">
                    <div class="form-group col-md-6">
                      <label>Category</label>
                      <select class="form-control select2" disabled id="category_id" name="category_id" style="width: 100%;">
                        {{-- <option selected="selected">Alabama</option> --}}
                       @foreach ($categories as $category )

                       <option @if ($category->id == $articles->category_id) selected @endif value="{{ $category->id }}">
                        {{ $category->name }}</option>

                       @endforeach

                      </select>
                    </div>

                    <div class="form-group col-md-6">
                          <label>Author</label>
                          <select class="form-control select2" disabled id="author_id" name="author_id" style="width: 100%;">
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
                  <input type="text" class="form-control" disabled name="title" id="title"
                  value="{{$articles->title}}" placeholder="Enter Article Name">
                </div>

                <div class="form-group col-md-6">
                  <label for="image">Choose Image </label>
                  <input type="file" class="form-control" disabled name="image" id="image" placeholder="Enter Article Name">
                </div>
              </div>
              <div class="row">

             <div class="col-md-12">
                  <div class="form-group" >
                      <label for="short_description">Short Description of Article</label>
                          <textarea class="form-control" disabled style="resize: none;" id="short_description" name="short_description" rows="4"
                          placeholder="Enter Description of Article " cols="50">{{$articles->short_description}}</textarea>
                  </div>
                </div>

                <div class="row">

                    <div class="col-md-12">
                         <div class="form-group">
                             <label for="full_description">Full Description of Article</label>
                                 <textarea class="form-control" disabled style="resize: none;" id="full_description" name="full_description" rows="4"
                                 placeholder="Enter Description of Article " cols="50">{{$articles->full_description}}</textarea>
                         </div>
                       </div>
              </div>
            </div>

        </div>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{route('articles.index')}}" type="button" class="btn btn-success">GO BACK</a>

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


@endsection

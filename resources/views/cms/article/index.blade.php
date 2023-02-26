@extends('cms.parent')

@section('title' , 'INDEX Article')

@section('main-title' , 'Index Article')

@section('sub-title' , 'Index Article')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              {{-- <h3 class="card-title">List Data of Article</h3> --}}
              {{-- <a href="{{route('createArticle' , $id)}}" type="button" class="btn btn-info"> ADD NEW Article</a> --}}

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Article Title</th>
                    <th>image</th>
                    <th>Short Description</th>

                    <th>Setting</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article )
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title}}</td>
                        <td>
                            <img class="img-circle img-bordered-sm" src="{{asset('storage/images/article/'.$article->image ?? "")}}" width="50" height="50" alt="User Image">
                        </td>
                        <td>{{ $article->short_description}}</td>

                         {{-- <td><span class="badge bg-info">({{$Article->status}})</td> --}}
                        <td>

                          <div class="btn group">
                            <a href="{{route('articles.edit' ,$article->id )}}" type="button" class="btn btn-info">
                              <i class="fas fa-edit"></i>
                              {{-- <i class="fas fa-edit"></i> --}}
                            </a>
                            <button onclick="performDestroy({{ $article->id}} , this )" type="button" class="btn btn-danger">
                              <i class="fas fa-trash-alt"></i>
                            </button>

                            <a href="{{route('articles.show' ,$article->id )}}" type="button" class="btn btn-success">
                                <i class="fas fa-eye"></i>
                                {{-- <i class="fas fa-edit"></i> --}}
                              </a>

                          </div>

                        </td>
                      </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            {{ $articles->links() }}
          </div>

      </div>
      <!-- /.row -->

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

@endsection

@section('scripts')
  <script>
    function performDestroy(id , referance){
      confirmDestroy('/cms/admin/articles/' + id , referance);

    }
  </script>
@endsection

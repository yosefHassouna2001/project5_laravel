@extends('cms.parent')

@section('title' , 'INDEX Slider')

@section('main-title' , 'Index Slider')

@section('sub-title' , 'Index Slider')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <form action="" method="get" style="margin-bottom: 2%;">
                <div class="row">
                  <div class="input-icon col-md-2">
                    <input type="text" class="form-control" placeholder="Search By Title"
                    name="title" @if(request()->title) value{{ request()->title }}
                      
                    @endif/>
                    <span>
                      <i class="flaticon2-search-1 text-muted"></i>
                    </span>
                  </div>
                  <div class="input-icon col-md-2">
                    <input type="text" class="form-control" placeholder="Search By title"
                    name="description" @if(request()->description) value{{ request()->description }}
                      
                    @endif/>
                    <span>
                      <i class="flaticon2-search-1 text-muted"></i>
                    </span>
                  </div>
                  <div class="input-icon col-md-2">
                    <input type="date" class="form-control" placeholder="Search By created at"
                    name="created_at" @if(request()->created_at) value{{ request()->created_at }}
                      
                    @endif/>
                    <span>
                      <i class="flaticon2-search-1 text-muted"></i>
                    </span>
                  </div>

                  <div class=" col-md-4">
                    <button class="btn btn-success btn-md" type="submit"> Filter</button>
                    <a href="{{ route('sliders.index') }}" class="btn btn-danger btn-md"> End Filter</a>
                    <a href="{{ route('sliders.create') }}"><button type="button" class="btn btn-primary btn-md"> Add new slider </button> </a>
                  
                </div>
              </form>


              {{-- <h3 class="card-title">List Data of slider</h3> --}}
              {{-- <a href="{{route('sliders.create')}}" type="button" class="btn btn-danger"> ADD NEW Slider</a> --}}

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Title slider</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th> Setting</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider )
                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td>{{ $slider->title}}</td>
                        <td>
                          <img class="img-circle img-bordered-sm"  src="{{asset('storage/images/slider/'.$slider->image ?? "" )  }}" alt="User Image" width="50" height="50" >
                        </td>

                        <td>{{ $slider->description}}</td>

                        <td>

                          <div class="btn group">
                            <a href="{{route('sliders.edit' ,$slider->id )}}" type="button" class="btn btn-info">
                              <i class="fas fa-edit"></i>
                              {{-- <i class="fas fa-edit"></i> --}}
                            </a>
                            <button onclick="performDestroy({{ $slider->id}} , this )" type="button" class="btn btn-danger">
                              <i class="fas fa-trash-alt"></i>
                            </button>

                          </div>

                        </td>
                      </tr>
                    @endforeach


                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            {{ $sliders->links() }}
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
      confirmDestroy('/cms/admin/sliders/' + id , referance);

    }

  </script>
@endsection

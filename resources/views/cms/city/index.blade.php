
@extends('cms.parent')

@section('title', 'Index City')
@section('main-title', 'Index City')
@section('sub-title', 'Index City')

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
                                <input type="text" class="form-control" placeholder="Search By city name"
                                name="city_name" @if(request()->city_name) value{{ request()->city_name }}
                                  
                                @endif/>
                                <span>
                                  <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                              </div>
                              <div class="input-icon col-md-2">
                                <input type="text" class="form-control" placeholder="Search By street"
                                name="street" @if(request()->street) value{{ request()->street }}
                                  
                                @endif/>
                                <span>
                                  <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                              </div>
                          
            
                              <div class=" col-md-4">
                                <button class="btn btn-success btn-md" type="submit"> Filter</button>
                                <a href="{{ route('cities.index') }}" class="btn btn-danger btn-md"> End Filter</a>
                                <a href="{{ route('cities.create') }}"><button type="button" class="btn btn-primary btn-md"> Add new City </button> </a>
                              
                            </div>
                          </form>
            
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered mb-3">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>City Name</th>
                                <th>City street</th>
                                <th>Country Name</th>
                                <th>Setting</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($cities as $city)
                                    <tr>
                                        <td>{{ $city->id }}</td>
                                        <td>{{ $city->city_name }}</td>
                                        <td>{{ $city->street }}</td>
                                        <td><span class="badge bg-info"> {{ $city->country->name ?? "" }}</span></td>
                                        <td style="width: 200px">
                                            <div class="btn group w-100">
                                                <a href="{{ route('cities.edit' , $city->id) }}" type="button" class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <a type="button" onclick="performDestroy({{ $city->id }} , this)" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>   
                                @endforeach
                            
                            </tbody>
                        </table>
                        {{ $cities->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

@endsection

@section('scripts')

<script>
    function performDestroy(id , referance){
        confirmDestroy('/cms/admin/cities/' + id , referance)
    }
</script>

@endsection
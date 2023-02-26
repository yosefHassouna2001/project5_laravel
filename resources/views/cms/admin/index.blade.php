
@extends('cms.parent')

@section('title', 'Index Admin')
@section('main-title', 'Index Admin')
@section('sub-title', 'Index Admin')

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
                              <div class="input-icon col-md-4">
                                <input type="text" class="form-control" placeholder="Search By name"
                                name="city_name" @if(request()->city_name) value{{ request()->city_name }}
                                  
                                @endif/>
                                <span>
                                  <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                              </div>
                              <div class="input-icon col-md-4">
                                <input type="text" class="form-control" placeholder="Search By email"
                                name="street" @if(request()->street) value{{ request()->street }}
                                  
                                @endif/>
                                <span>
                                  <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                              </div>
                          
            
                              <div class=" col-md-4 ">
                                <button class="btn btn-success btn-md ml-3  float-right" type="submit"> Filter</button>
                                <a href="{{ route('cities.index') }}" class="btn btn-danger btn-md ml-3  float-right"> End Filter</a>
                                
                             </div>
                            </div>
                             <div class="row mt-3">
                              <div class=" col-md-12 ">

                                <a href="{{ route('admins.create') }}" type="submit" class="btn btn-info">Add New Admin</a>
                                <a  href="{{ route('restoreindex') }}" type="submit" class="btn btn-secondary ml-3 float-right ">Restore Admin <i class="fas  fa-trash-alt"></i></a>
                                <a  href="{{ route('admins.index') }}" type="submit" class="btn btn-success ml-3 float-right">All Admin</a>
                              </div>
                             </div>
                          </form>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered mb-3">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Image</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>City Name</th>

                                <th>Setting</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->id }}</td>
                                        <td>
                                            <img class="img-circle img-bordered-sm"  src="{{asset('storage/images/admin/'.$admin->user->image ?? "" )  }}" alt="User Image" width="50" height="50" >
                                        </td>
                                        <td>{{ $admin->user->first_name  . " " . $admin->user->last_name ?? ""  }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->user->mobile ?? "" }}</td>
                                        <td>{{ $admin->user->gender ?? "" }}</td>
                                        <td>
                                            @if ($admin->user->status ?? "" =="active") 
                                                <span class="badge bg-success">{{ $admin->user->status ?? "" }}</span>
                                            @elseif ($admin->user->status ?? "" =="inactive")
                                                <span class="badge bg-danger">{{ $admin->user->status ?? "" }}</span>
                                            
                                            @endif
                                        </td>
                                        <td><span class="badge bg-info"> {{ $admin->user->city->city_name ?? "" }}</span></td>
                                        
                                        <td >
                                            <div class="btn group w-100 ">
                                                <a href="{{ route('admins.edit' , $admin->id) }}" type="button"
                                                    @if($admin->deleted_at !== null)
                                                    hidden 
                                                    @endif
                                                    class="btn btn-info mb-md-3   ">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <a type="button" onclick="performDestroy({{ $admin->id }} , this)" class="btn btn-danger mb-md-3">
                                                <i class="fas fa-trash-alt"></i>
                                                </a>
                                                <a href="{{ route('restore' , $admin->id) }}" type="button"
                                                    @if($admin->deleted_at == null)
                                                    hidden 
                                                    @endif
                                                    class="btn btn-info mb-md-3 ">
                                                    &#x21BA;
                                                </a>
                                            </div>
                                        </td>
                                    </tr>   
                                @endforeach
                            
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $admins->links() }}
                        </div>
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
        confirmDestroy('/cms/admin/admins/' + id , referance)
    }
</script>

@endsection
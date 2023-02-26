
@extends('cms.parent')

@section('title', 'Index Viewer')
@section('main-title', 'Index Viewer')
@section('sub-title', 'Index Viewer')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('viewers.create') }}" type="submit" class="btn btn-info">Add New viewer</a>
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
                                @foreach($viewers as $viewer)
                                    <tr>
                                        <td>{{ $viewer->id }}</td>
                                        <td>
                                            <img class="img-circle img-bordered-sm"  src="{{asset('storage/images/viewer/'.$viewer->user->image ?? "" )  }}" alt="User Image" width="50" height="50" >
                                        </td>
                                        <td>{{ $viewer->user->first_name  . " " . $viewer->user->last_name ?? ""  }}</td>
                                        <td>{{ $viewer->email }}</td>
                                        <td>{{ $viewer->user->mobile ?? "" }}</td>
                                        <td>{{ $viewer->user->gender ?? "" }}</td>
                                        <td>
                                            @if ($viewer->user->status ?? "" =="active") 
                                                <span class="badge bg-success">{{ $viewer->user->status ?? "" }}</span>
                                            @elseif ($viewer->user->status ?? "" =="inactive")
                                                <span class="badge bg-danger">{{ $viewer->user->status ?? "" }}</span>
                                            
                                            @endif
                                        </td>
                                        <td><span class="badge bg-info"> {{ $viewer->user->city->city_name ?? "" }}</span></td>
                                        
                                        <td >
                                            <div class="btn group w-100 ">
                                                <a href="{{ route('viewers.edit' , $viewer->id) }}" type="button" class="btn btn-info mb-md-3   ">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <a type="button" onclick="performDestroy({{ $viewer->id }} , this)" class="btn btn-danger mb-md-3">
                                                <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>   
                                @endforeach
                            
                            </tbody>
                        </table>
                        {{ $viewers->links() }}
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
        confirmDestroy('/cms/viewer/viewers/' + id , referance)
    }
</script>

@endsection
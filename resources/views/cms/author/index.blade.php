
@extends('cms.parent')

@section('title', 'Index Author')
@section('main-title', 'Index Author')
@section('sub-title', 'Index Author')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('authors.create') }}" type="submit" class="btn btn-info">Add New Author</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered mb-3">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Image</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>City Name</th>
                                <th>Articles</th>

                                <th>Setting</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($authors as $author)
                                    <tr>
                                        <td>{{ $author->id }}</td>
                                        <td>
                                            <img class="img-circle img-bordered-sm" src="{{asset('storage/images/author/'.$author->user->image )?? "" }}" width="50" height="50" alt="User Image">
                                        </td>
                                        <td>{{ $author->user->first_name ?? "" }}</td>
                                        <td>{{ $author->user->last_name ?? "" }}</td>
                                        <td>{{ $author->email }}</td>
                                        <td>{{ $author->user->mobile ?? "" }}</td>
                                        <td>{{ $author->user->gender ?? "" }}</td>
                                        <td>
                                            @if ($author->user->status =="active") 
                                                <span class="badge bg-success">{{ $author->user->status ?? "" }}</span>
                                            @elseif ($author->user->status =="inactive")
                                                <span class="badge bg-danger">{{ $author->user->status ?? "" }}</span>
                                            
                                            @endif
                                        </td>
                                        <td><span class="badge bg-info"> {{ $author->user->city->city_name ?? "" }}</span></td>
                                        
                                        <td><a href="{{route('indexArticle',['id'=>$author->id])}}"
                                            class="btn btn-info">({{$author->articles_count}})
                                            article/s</a> 
                                        </td>
                                        
                                            <td >
                                            <div class="btn group w-100 ">
                                                <a href="{{ route('authors.edit' , $author->id) }}" type="button" class="btn btn-info mb-md-3   ">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <a type="button" onclick="performDestroy({{ $author->id }} , this)" class="btn btn-danger mb-md-3">
                                                <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>   
                                @endforeach
                            
                            </tbody>
                        </table>
                        {{ $authors->links() }}
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
        confirmDestroy('/cms/admin/authors/' + id , referance)
    }
</script>

@endsection

@extends('cms.parent')

@section('title', 'Index Category')
@section('main-title', 'Index Category')
@section('sub-title', 'Index Category')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('categories.create') }}" type="submit" class="btn btn-info">Add New Category</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered mb-3">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Setting</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @if($category->status == 'active')
                                                <span class="badge bg-success">( {{ $category->status}} )</span>
                                            @elseif ($category->status == 'inactive')
                                                <span class="badge bg-danger">( {{ $category->status}} )</span>
                                            
                                            @endif
                                        </td>

                                        <td style="width: 200px">
                                            <div class="btn group w-100">
                                                <a href="{{ route('categories.edit' , $category->id) }}" type="button" class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <a type="button" onclick="performDestroy({{ $category->id }} , this)" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>   
                                @endforeach
                            
                            </tbody>
                        </table>
                        {{ $categories->links() }}
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
        confirmDestroy('/cms/admin/categories/' + id , referance)
    }
</script>

@endsection
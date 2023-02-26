
@extends('cms.parent')

@section('title', 'Index Comment')
@section('main-title', 'Index Comment')
@section('sub-title', 'Index Comment')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('comments.create') }}" type="submit" class="btn btn-info">Add New comment</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered mb-3">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>commenter Name</th>
                                <th>comment</th>
                                <th>Setting</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td><span class="badge bg-info"> {{ $comment->viewer->user->first_name ?? "" }}</span></td>
                                        <td>{{ $comment->comment ?? "" }}</td>
                                        <td style="width: 200px">
                                            <div class="btn group w-100">
                                               
                                                <a type="button" onclick="performDestroy({{ $comment->id }} , this)" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>   
                                @endforeach
                            
                            </tbody>
                        </table>
                        {{ $comments->links() }}
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
        confirmDestroy('/cms/admin/comments/' + id , referance)
    }
</script>

@endsection
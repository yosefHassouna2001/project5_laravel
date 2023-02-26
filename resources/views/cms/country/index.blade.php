
@extends('cms.parent')

@section('title', 'Index Country')
@section('main-title', 'Index Country')
@section('sub-title', 'Index Country')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('countries.create') }}" type="submit" class="btn btn-info">Add New Country</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered mb-3">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Country Name</th>
                                <th>Number of City</th>
                                <th>Country Code</th>
                                <th>Setting</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($countries as $country)
                                    <tr>
                                        <td>{{ $country->id }}</td>
                                        <td>{{ $country->name }}</td>
                                        <td><span class="badge bg-info">( {{ $country->cities_count}} ) Cities</span></td>
                                        <td>{{ $country->code }}</td>
                                        <td style="width: 200px">
                                            <div class="btn group w-100">
                                                <a href="{{ route('countries.edit' , $country->id) }}" type="button" class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <a type="button" onclick="performDestroy({{ $country->id }} , this)" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>   
                                @endforeach
                            
                            </tbody>
                        </table>
                        {{ $countries->links() }}
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
        confirmDestroy('/cms/admin/countries/' + id , referance)
    }
</script>

@endsection
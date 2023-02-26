
@extends('cms.parent')

@section('title', 'Edit Country')
@section('main-title', 'Edit Country')
@section('sub-title', 'Edit Country')

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
                        <h3 class="card-title">Edit Country</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Edit Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                            value="{{ $countries->name }}" placeholder="Enter Edit Name">
                        </div>
                        <div class="form-group">
                            <label for="code">Edit Code</label>
                            <input type="text" class="form-control" id="code" name ="code" 
                            value="{{ $countries->code }}" placeholder="Enter Edit Code">
                        </div>
                        
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button onclick="preformUpdate({{ $countries->id }})" type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('countries.index') }}" type="submit" class="btn btn-info">Go back</a>
                        
                    </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
  </section>

@endsection

@section('scripts')

<script>
    function preformUpdate(id){
        let formData = new FormData();
        formData.append('name' , document.getElementById('name').value);
        formData.append('code' , document.getElementById('code').value);
        storeRoute('/cms/admin/countries-update/'+id , formData);
    }
</script>
@endsection

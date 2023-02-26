
@extends('cms.parent')

@section('title', 'Create Country')
@section('main-title', 'Create Country')
@section('sub-title', 'Create Country')

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
                    <h3 class="card-title">Create Country</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                    <div class="card-body">
                        <div class="form-group">
                        <label for="name">Country Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Country Name">
                        </div>
                        <div class="form-group">
                        <label for="code">Country Code</label>
                        <input type="text" class="form-control" id="code" name ="code" placeholder="Enter Country Code">
                        </div>
                        
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button onclick="preformStore()" type="button" class="btn btn-primary">Store</button>
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
    function preformStore(){
        let formData = new FormData();
        formData.append('name' , document.getElementById('name').value);
        formData.append('code' , document.getElementById('code').value);
        store('/cms/admin/countries' , formData);
    }
</script>

@endsection

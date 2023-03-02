@extends('cms.parent')

@section('title' , 'company')

@section('main-title' , 'Edit company')

@section('sub-title' , 'Edit company')


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
              <h3 class="card-title">Edit company</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
                @csrf
                <div class="card-body">

             <div class="row">

                <div class="form-group col-md-6">
                  <label for="name"> Name</label>
                  <input type="text" class="form-control" name="name" id="name" disabled
                  value="{{ $companies->name }}" placeholder="Enter name of company">
                </div>
              <div class="form-group col-md-4">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" disabled
                  value="{{ $companies->name }}" placeholder="Enter Firstname of company">
                </div>
                </div>
              <div class="row">

                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status" disabled
                    aria-label=".form-select-sm example">
                    <option selected >{{ $companies->status }}</option>
                    <option value="active">active</option>
                        <option value="inactive">inactive</option>
                    </select>
                </div>

            </div>

              <div class="row">

                <div class="form-group col-md-12">
                    <label for="description"> Description of Slider</label>
                        <textarea class="form-control" style="resize: none;" id="description" name="description" rows="4"
                        placeholder="Enter Description of Slider "  disabled cols="50">
                    {{ $companies->description }}</textarea>
                </div>


              <div class="card-footer">

                <a href="{{ route('companies.index') }}" type="submit" class="btn btn-secondary">Go To Index</a>

              </div>
            </form>
          </div>

        </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('scripts')

<script>


</script>
@endsection

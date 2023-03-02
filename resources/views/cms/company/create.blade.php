@extends('cms.parent')

@section('title' , 'company')

@section('main-title' , 'Create company')

@section('sub-title' , 'create company')


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
              <h3 class="card-title">Create company</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
                @csrf
                <div class="card-body">

             <div class="row">

                <div class="form-group col-md-6">
                  <label for="name"> Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter name of company">
                </div>
              <div class="form-group col-md-4">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter Firstname of company">
                </div>
                </div>
              <div class="row">

                <div class="form-group col-md-4">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password">
                </div>
                <div class="form-group col-md-6">
                    <label for="status">status</label>
                    <select class="form-control" name="status" style="width: 100%;"
                        id="status" aria-label=".form-select-sm example">
                          <option value=""> All </option>
                          <option value="active"> Active </option>
                          <option value="inactive"> Inactive </option>

                    </select>
                </div>

            </div>

              <div class="row">

                <div class="form-group col-md-12">
                    <label for="description"> Description of Slider</label>
                        <textarea class="form-control" style="resize: none;" id="description" name="description" rows="4"
                        placeholder="Enter Description of Slider " cols="50"></textarea>
                </div>


              <div class="card-footer">

                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
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
   function performStore(){

    let formData = new FormData();
    formData.append('name',document.getElementById('name').value);
    formData.append('email',document.getElementById('email').value);
    formData.append('password',document.getElementById('password').value);
    formData.append('status',document.getElementById('status').value);
    formData.append('description',document.getElementById('description').value);

    store('/cms/admin/companies' , formData);

   }

</script>
@endsection

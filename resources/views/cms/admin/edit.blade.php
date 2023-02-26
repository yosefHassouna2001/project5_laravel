
@extends('cms.parent')

@section('title', 'Edit Admin')
@section('main-title', 'Edit Admin')
@section('sub-title', 'Edit Admin')

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
                    <h3 class="card-title">Edit Admin</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>City Name</label>
                                    <select class="form-control select2" id="city_id" name="city_id" style="width: 100%;">
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}"
                                                @if($city->id == $admins->user->city_id)
                                                selected
                                                @endif>
                                                {{ $city->city_name }}
                                            </option> 
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name">Admin First Name</label>
                                    <input type="text" value="{{ $admins->user->first_name }}" class="form-control" id="first_name" name="first_name" placeholder="Enter Admin First Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name">Admin Last Name</label>
                                    <input type="text" value="{{ $admins->user->last_name }}"  class="form-control" id="last_name" name ="last_name" placeholder="Enter Admin Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Admin Email</label>
                                    <input type="email" value="{{ $admins->email }}"  class="form-control" id="email" name="email" placeholder="Enter Admin Email">
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name ="password" placeholder="Enter Admin Password">
                                </div>
                            </div> --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" value="{{ $admins->user->mobile }}"  class="form-control" id="mobile" name ="mobile" placeholder="Enter Admin Mobile">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Admin Address</label>
                                    <input type="text" value="{{ $admins->user->address }}"  class="form-control" id="address" name="address" placeholder="Enter Admin Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_of_birth">Date Of Birth</label>
                                    <input type="date" value="{{ $admins->user->date_of_birth }}"  class="form-control" id="date_of_birth" name ="date_of_birth" placeholder="Enter Admin date_of_birth">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="gender">Gender</label>
                                <select name="gender" class="form-control" id="gender" 
                                aria-label=".form-select-sm example">
                                    <option selected >{{ $admins->user->gender }}</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status"
                                aria-label=".form-select-sm example">
                                <option selected >{{ $admins->user->status }}</option>
                                <option value="active">active</option>
                                    <option value="inactive">inactive</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Choose Image</label>
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Enter Admin Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button onclick="preformUpdate({{ $admins->id }})" type="button" class="btn btn-primary">Update</button>
                        <a href="{{ route('admins.index') }}" type="submit" class="btn btn-info">Go back</a>
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
        formData.append('first_name' , document.getElementById('first_name').value);
        formData.append('last_name' , document.getElementById('last_name').value);
        formData.append('email' , document.getElementById('email').value);
        // formData.append('password' , document.getElementById('password').value);
        formData.append('mobile' , document.getElementById('mobile').value);
        formData.append('address' , document.getElementById('address').value);
        formData.append('date_of_birth' , document.getElementById('date_of_birth').value);
        formData.append('gender' , document.getElementById('gender').value);
        formData.append('status' , document.getElementById('status').value);
        formData.append('city_id' , document.getElementById('city_id').value);
        formData.append('image' , document.getElementById('image').files[0]);
        storeRoute('/cms/admin/admins-update/'+ id , formData);
    }
</script>

@endsection


@extends('cms.parent')

@section('title', 'Edit Author')
@section('main-title', 'Edit Author')
@section('sub-title', 'Edit Author')

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
                    <h3 class="card-title">Edit Author</h3>
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
                                                @if($city->id == $authors->user->city_id)
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
                                    <label for="first_name">Author First Name</label>
                                    <input type="text" value="{{ $authors->user->first_name }}" class="form-control" id="first_name" name="first_name" placeholder="Enter Author First Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name">Author Last Name</label>
                                    <input type="text" value="{{ $authors->user->last_name }}"  class="form-control" id="last_name" name ="last_name" placeholder="Enter Author Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Author Email</label>
                                    <input type="email" value="{{ $authors->user->email }}"  class="form-control" id="email" name="email" placeholder="Enter Author Email">
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name ="password" placeholder="Enter Author Password">
                                </div>
                            </div> --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" value="{{ $authors->user->mobile }}"  class="form-control" id="mobile" name ="mobile" placeholder="Enter Author Mobile">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Author Address</label>
                                    <input type="text" value="{{ $authors->user->address }}"  class="form-control" id="address" name="address" placeholder="Enter Author Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_of_birth">Date Of Birth</label>
                                    <input type="date" value="{{ $authors->user->date_of_birth }}"  class="form-control" id="date_of_birth" name ="date_of_birth" placeholder="Enter Author date_of_birth">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="gender">Gender</label>
                                <select name="gender" class="form-control" id="gender" 
                                aria-label=".form-select-sm example">
                                    <option selected >{{ $authors->user->gender }}</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status"
                                aria-label=".form-select-sm example">
                                <option selected >{{ $authors->user->status }}</option>
                                <option value="active">active</option>
                                    <option value="inactive">inactive</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Choose Image</label>
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Enter Author Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button onclick="preformUpdate({{ $authors->id }})" type="button" class="btn btn-primary">Update</button>
                        <a href="{{ route('authors.index') }}" type="submit" class="btn btn-info">Go back</a>
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
        storeRoute('/cms/admin/authors-update/'+ id , formData);
    }
</script>

@endsection

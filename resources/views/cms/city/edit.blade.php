
@extends('cms.parent')

@section('title', 'Edit City')
@section('main-title', 'Edit City')
@section('sub-title', 'Edit City')

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
                        <h3 class="card-title">Edit City</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Country Name</label>
                                    <select class="form-control select2" id="country_id" name="country_id" style="width: 100%;">
                                        @foreach($countries as $country)
                                            {{-- <option value="{{ $country->id }}">{{ $country->name }}</option> --}}
                                            <option 
                                                @if($country->id == $cities->country_id)
                                                    selected
                                                @endif 
                                                value="{{ $country->id }}">{{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city_name">City Name</label>
                                    <input type="text" class="form-control" id="city_name" name="city_name"
                                    value="{{ $cities->city_name }}" placeholder="Enter City Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="street">City street</label>
                                    <input type="text" class="form-control" id="street" name ="street"
                                    value="{{ $cities->street }}"  placeholder="Enter City street">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button onclick="preformUpdate({{ $cities->id }})" type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('cities.index') }}" type="submit" class="btn btn-info">Go back</a>
                        
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
        formData.append('city_name' , document.getElementById('city_name').value);
        formData.append('street' , document.getElementById('street').value);
        formData.append('country_id' , document.getElementById('country_id').value);
        storeRoute('/cms/admin/cities-update/'+id , formData);
    }
</script>
@endsection

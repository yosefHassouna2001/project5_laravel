@extends('cms.parent')

@section('title' , 'company')

@section('main-title' , 'Index company')

@section('sub-title' , 'index company')


@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">

                    <a href="{{ route('companies.create') }}" type="submit" class="btn btn-info">Add New Company</a>
                    <a  href="{{ route('restoreindex') }}" type="submit" class="btn btn-secondary ml-3 float-right ">Restore Company <i class="fas  fa-trash-alt"></i></a>
                    <a  href="{{ route('companies.index') }}" type="submit" class="btn btn-success ml-3 float-right">All Comany</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              {{--  --}}
              <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>

                <th>Setting</th>
            </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>
                            @if ($company->status =="active")
                                <span class="badge bg-success">{{ $company->status ?? "" }}</span>
                            @elseif ($company->status =="inactive")
                                <span class="badge bg-danger">{{ $company->status ?? "" }}</span>

                            @endif
                        </td>

                        <td >
                            <div class="btn group w-100 ">
                                <a href="{{ route('companies.edit' , $company->id) }}" type="button"
                                    @if($company->deleted_at !== null)
                                    hidden
                                    @endif
                                    class="btn btn-info mb-md-3   ">
                                <i class="fas fa-edit"></i>
                                </a>
                                <a  type="button" href="{{ route('companies.show' , $company->id) }}">Show</a>
                                <a type="button" onclick="performDestroy({{ $company->id }} , this)" class="btn btn-danger mb-md-3">
                                <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href="{{ route('restore' , $company->id) }}" type="button"
                                    @if($company->deleted_at == null)
                                    hidden
                                    @endif
                                    class="btn btn-info mb-md-3 ">
                                    &#x21BA;
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $companies->links() }}
              {{--  --}}

      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')

<script>
    function performDestroy(id , referance){
        let url ='/cms/admin/companies/'+id;
        confirmDestroy(url , referance);
    }
  </script>
@endsection

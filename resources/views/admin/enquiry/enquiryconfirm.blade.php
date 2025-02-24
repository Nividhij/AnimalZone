@extends('admin.layout')
@section('main_content')
  <div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-4 align-items-center">
          <div class="col-md-6">
            <h1 class="m-0">Enquiry List</h1>
          </div>
          <div class="col-md-6">
            <ol class="breadcrumb float-md-end">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Enquiry List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Card Container -->
    <div class="container mt-4">
      <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
          <h3 class="card-title mb-0">Settled Enquiries</h3>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered">
              <thead class="table-dark">
                <tr>
                  <th style="width: 5%">ID</th>
                  <th>Name</th>
                  <th>Product</th>
                  <th>Mobile Number</th>
                  <th>Address</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th class="text-center" style="width: 15%">Actions</th>
                </tr>
              </thead>
              <tbody>
                @php $i = 1; @endphp
                @foreach ($setteled as $value)
               
                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->product_id }}</td>
                    <td>{{ $value->mobile }}</td>
                    <td>{{ $value->address }}</td>
                    <td>{{ $value->description ?? '-' }}</td>
                    <td>
                      <span class="badge bg-success">Settled</span>
                    </td>
                    <td class="text-center">
                      <form 
                        action="{{ route('enquiries.destroy', $value->id) }}" 
                        method="POST" 
                        onsubmit="return confirm('Are you sure you want to delete this enquiry?');"
                      >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                          <i class="fas fa-trash-alt"></i> Delete
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div> <!-- /.table-responsive -->
        </div> <!-- /.card-body -->
      </div> <!-- /.card -->
    </div> <!-- /.container -->
  </div> <!-- /.content-wrapper -->
@endsection

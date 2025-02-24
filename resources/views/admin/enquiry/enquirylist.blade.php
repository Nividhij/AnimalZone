@extends('admin.layout')
@section('main_content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
        <div class="card-header d-flex justify-content-between align-items-center bg-dark text-white">
          <h3 class="card-title mb-0">Enquiry List</h3>
        </div>

        <div class="card-body p-0">
          <table class="table table-hover table-bordered text-center">
            <thead class="table-dark">
              <tr>
                <th style="width: 10%">ID</th>
                <th>Name</th>
                <th>Product</th>
                <th>Mobile Number</th>
                <th>Address</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>

              </tr>
            </thead>
            <tbody>
            @foreach( $pending as $key => $value)
              <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->product_id }}</td>
                <td>{{ $value->mobile }}</td>
                <td>{{ $value->address }}</td>
                <td>{{ $value->description ?? '-' }}</td>
                <td>{{ $value->status }}</td>
                <td>
                  <!-- Form for toggling the status -->
                  <form action="{{ route('enquiries.changestatus', $value->id) }}" method="POST">
                      @csrf
                     
                      <button type="submit" class="btn btn-xs btn-success">
                      {{ $value->status == 0 ? 'Settle' : 'Settled' }}
                      </button>
                  </form>
                </td>
              </tr>
            @endforeach

          
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

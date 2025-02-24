@extends('admin.layout')
@section('main_content')

<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Page Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-4 align-items-center">
        <div class="col-md-6">
          <h1 class="m-0 text-dark">Food Management</h1>
        </div>
        <div class="col-md-6">
          <ol class="breadcrumb float-md-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Foods</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Card -->
  <div class="container mt-4">
    <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
        <h3 class="card-title mb-0">Manage Foods</h3>
        <a href="{{ route('food.create') }}" class="btn btn-dark btn-sm">Add New</a>
      </div>

      <div class="card-body p-0">
        <table class="table table-hover table-bordered text-center">
          <thead class="table-dark">
            <tr>
              <th style="width: 5%">ID</th>
              <th style="width: 20%">Name</th>
              <th style="width: 20%">Type</th>
              <th style="width: 15%">Animal Type</th>
              <th style="width: 10%">Weight</th>
              <th style="width: 10%">Price</th>
              <th style="width: 20%">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($food as $key => $value)
              <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->type }}</td>
                <td>{{ $value->animal_type }}</td>
                <td>{{ $value->weight }}</td>
                <td>${{ number_format($value->price, 2) }}</td>
                <td class="d-flex justify-content-center gap-2">
                  <!-- Edit Button -->
                  <a href="{{ route('food.edit', $value->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                  </a>

                  <!-- Delete Form -->
                  <form 
                    action="{{ route('food.delete', $value->id) }}" 
                    method="POST" 
                    onsubmit="return confirm('Are you sure you want to delete this food item?');"
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
      </div>
    </div>
  </div>
</div>

@endsection

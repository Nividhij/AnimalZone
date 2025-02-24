@extends('admin.layout')
@section('main_content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-4 align-items-center">
          <div class="col-md-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-md-6">
            <ol class="breadcrumb float-md-end">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Card Container -->
    <div class="container mt-4">
      <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-dark text-white">
          <h3 class="card-title mb-0">Attribute List</h3>
          <a href="{{ route('admin.atrcategory_list') }}" class="btn btn-primary btn-sm">Add New</a>
        </div>

        <div class="card-body p-0">
          <table class="table table-hover table-bordered text-center">
            <thead class="table-dark">
              <tr>
                <th style="width: 10%">ID</th>
                <th>Attribute Name</th>
             
                <th style="width: 25%">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($atr as $key => $value)
              <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->attribute_name }}</td>
                
                <td class="d-flex justify-content-center gap-2">
                  <a href="{{ route('admin.items.atredit', $value->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <form 
                    action="{{ route('admin.items.atrdestroy', $value->id) }}" 
                    method="POST" 
                    onsubmit="return confirm('Are you sure you want to delete this category?');"
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
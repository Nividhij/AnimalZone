@extends('admin.layout')
@section('main_content')

<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Page Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-4 align-items-center">
        <div class="col-md-6">
          <h1 class="m-0 text-dark">Subcategory Management</h1>
        </div>
        <div class="col-md-6">
          <ol class="breadcrumb float-md-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Subcategories</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Card -->
  <div class="container mt-4">
    <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
        <h3 class="card-title mb-0">Manage Subcategories</h3>
        <a href="{{ route('admin.subcategory_list') }}" class="btn btn-dark btn-sm">Add New</a>
      </div>

      <div class="card-body p-0">
        <table class="table table-hover table-bordered text-center">
          <thead class="table-dark">
            <tr>
              <th style="width: 10%">ID</th>
              <th>Subcategory Name</th>
              <th>Category Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($subcat as $key => $value)
            
             <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->subcategory_name }}</td>
                <td>{{ $value->category_name }}</td>
                <td class="d-flex justify-content-center gap-2">
                  <a href="{{ route('admin.items.subedit',$value->id)}}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <form 
                    action="{{ route('admin.items.subdestroy', $value->id ) }}" 
                    method="POST" 
                    onsubmit="return confirm('Are you sure you want to delete this subcategory?');"
                  >
                  @csrf
                  @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                      <i class="fas fa-trash-alt"></i> Delete
                    </button>
                  </form>
                  <a href="{{ route('admin.items.asign',[ $value->id, $value->category_id]  ) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Assign
                  </a>
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

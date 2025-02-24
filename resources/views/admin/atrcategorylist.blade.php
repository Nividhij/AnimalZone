@extends('admin.layout')
@section('main_content')

<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Page Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-4 align-items-center">
        <div class="col-md-6">
          <h1 class="m-0 text-dark">Manage Categories</h1>
        </div>
        <div class="col-md-6">
          <ol class="breadcrumb float-md-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Category</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Form Card -->
  <div class="container mt-5">
    <div class="card mx-auto" style="max-width: 600px; border-radius: 10px; border: 1px solid #ddd;">
      <div class="card-header text-center bg-light">
        <h3 class="mb-0">Add New Attribute</h3>
      </div>

      <div class="card-body">
        <!-- Validation Errors -->
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- attribute Form -->
         
        <form action="{{ route('admin.atrcategory_submit') }}" method="POST" class="mt-3" enctype="multipart/form-data">
          @csrf
          <div class="mb-4">
            <label for="attribute_name" class="form-label">Attribute Name</label>
            <input 
              type="text" 
              name="attribute_name" 
              id="attribute_name" 
              class="form-control @error('attribute_name') is-invalid @enderror" 
              placeholder="Enter category name"
            >
            @error('attribute_name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="btn btn-dark w-100">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
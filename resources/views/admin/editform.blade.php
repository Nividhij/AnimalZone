@extends('admin.layout')
@section('main_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-4">
          <div class="col-md-6">
            <h1 class="m-0">Edit Category</h1>
          </div>
          <div class="col-md-6">
            <ol class="breadcrumb float-md-end">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Centered Card Layout -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
      <div class="card shadow-lg border-0" style="width: 40rem; border-radius: 15px;">
        <div class="card-header bg-dark text-white text-center py-3" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
          <h3 class="card-title mb-0">Edit Category</h3>
        </div>

        <div class="card-body p-5">
          <!-- Display Validation Errors -->
          @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Oops!</strong> Please fix the following errors:
              <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <!-- Edit Form -->
          <form action="{{ route('admin.items.edited', $item->id) }}" method="POST"  enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="form-floating mb-4">
              <input 
                type="text" 
                name="category_name" 
                value="{{ $item->category_name }}" 
                class="form-control @error('category_name') is-invalid @enderror" 
                id="category_name" 
                placeholder="Edit Category Name" 
            >
              <label for="category_name">Category Name</label>
              @error('category_name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
          <div class="mb-4">
            <label for="name" class="form-label">Image</label>
            <input 
              type="file" 
              name="image_path" 
              id="image_path" 
              class="form-control @error('image_path') is-invalid @enderror" 
              placeholder="Enter category image"
              
            >
            <img src="{{ asset('uploads/category/' . $item->image_path) }}" style="width: 40px;">
            @error('image_path')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between mt-4">
              <a href="{{ route('admin.category.index') }}" class="btn btn-secondary px-4 py-2">
                <i class="fas fa-arrow-left"></i> Back
              </a>
              <button type="submit" class="btn btn-success px-4 py-2">
                <i class="fas fa-save"></i> Save Changes
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection






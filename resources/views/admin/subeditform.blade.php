@extends('admin.layout')
@section('main_content')
<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Page Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-4 align-items-center">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Create Subcategory</h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-md-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Subcategory</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Card -->
    <div class="container mt-4">
        <div class="card shadow-lg border-light mx-auto" style="max-width: 500px;">
            <div class="card-header bg-gradient text-white">
                <h3 class="card-title">Subcategory Form</h3>
            </div>

            <div class="card-body">
                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <!-- Subcategory Form -->
                <form action="{{ route('admin.items.subedited', $item->id)}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-4">
                        <label for="subcategory_name" class="form-label">Subcategory Name</label>
                        <input 
                            type="text" 
                            name="subcategory_name" 
                            class="form-control @error('subcategory_name') is-invalid @enderror" 
                            placeholder="Enter Subcategory Name" 
                            value="{{ $item->subcategory_name }}"
                            required>
                        @error('subcategory_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="category_id" class="form-label">Category Name</label>
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach($sub as $key=>$value)
                                <option value="{{ $value->id }}" @if($value->id == $item->category_id)  selected @endif >{{ $value->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    

                    <button type="submit" class="btn btn-primary w-100">Save Subcategory</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Styles for Card Header Gradient */
    .bg-gradient {
        background: linear-gradient(to right, #007bff, #6c757d);
    }
</style>
@endsection
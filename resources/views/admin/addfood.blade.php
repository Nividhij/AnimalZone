@extends('admin.layout')
@section('main_content')



@push('styles')
<style>
    .bg-gradient {
        background: linear-gradient(to right, #007bff, #6c757d);
    }
</style>
@endpush


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-4 align-items-center">
                <div class="col-md-12">
                    <h1 class="m-0 text-dark">Create Food</h1>
                </div>
                <div class="col-md-12">
                    <ol class="breadcrumb float-md-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Food</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-12">
        <div class="card shadow-lg border-light mx-auto">
            <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                <h3 class="card-title mb-0">Food Form</h3>
                <a href="{{ route('food.show') }}" class="btn btn-dark btn-sm">View List</a>
            </div>

            <div class="card-body">
                <!-- Display Validation Errors -->
                

                <!-- Food Form -->
                <form action="{{ route('food.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">

                        <!-- Name -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    placeholder="Enter food name"
                                    value="{{ old('name') }}" 
                                    required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Type -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input 
                                    type="text" 
                                    name="type" 
                                    id="type" 
                                    class="form-control @error('type') is-invalid @enderror" 
                                    placeholder="Enter food type (e.g., dry, wet)"
                                    value="{{ old('type') }}" 
                                    required>
                                @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Animal Type -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="animal_type">Animal Type</label>
                                <input 
                                    type="text" 
                                    name="animal_type" 
                                    id="animal_type" 
                                    class="form-control @error('animal_type') is-invalid @enderror" 
                                    placeholder="Enter animal type (e.g., dog, cat)"
                                    value="{{ old('animal_type') }}" 
                                    required>
                                @error('animal_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Weight -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="weight">Weight</label>
                                <input 
                                    type="number" 
                                    step="0.01" 
                                    name="weight" 
                                    id="weight" 
                                    class="form-control @error('weight') is-invalid @enderror" 
                                    placeholder="Enter weight in kg/lbs"
                                    value="{{ old('weight') }}">
                                @error('weight')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input 
                                    type="number" 
                                    step="0.01" 
                                    name="price" 
                                    id="price" 
                                    class="form-control @error('price') is-invalid @enderror" 
                                    placeholder="Enter price"
                                    value="{{ old('price') }}" 
                                    required>
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input 
                                    type="file" 
                                    name="image" 
                                    id="image" 
                                    class="form-control @error('image') is-invalid @enderror"
                                    onchange="previewImage(event)">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-group mt-2">
                                    <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 100%; display: none;" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

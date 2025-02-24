@extends('admin.layout')
@section('main_content')
<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Page Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-4 align-items-center">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Attribute List</h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-md-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Attribute List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Card -->
    <div class="container mt-4">
        <div class="card shadow-lg border-light mx-auto" style="max-width: 600px;">
            <div class="card-header bg-gradient text-white">
                <h3 class="card-title">Select Attributes</h3>
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
                <!-- Dynamic Form -->
               
                <form method="POST" action="{{ route('admin.items.assign_atr')}}">
                <input type="hidden" name="category_id" value="{{ $category_id }}">
                <input type="hidden" name="sub_id" value="{{ $id }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Choose Attributes:</label>
                        <div class="row">
                            @foreach($assign as $key => $value)
                            @php
                                $assignIds = $assign->pluck('attribute_id')->toArray();
                            @endphp
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="attribute_name[]" value="{{ $value->id }}"
                                        {{ in_array($value->id, $assignIds) ? 'checked' : '' }}>
                                        <label class="form-check-label" >{{ $value->attribute_name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Styles for Card Header Gradient */
    .bg-gradient {
        background: linear-gradient(135deg, #3498db, #2ecc71);
    }

    /* Styling for checkboxes */
    .form-check-input {
        cursor: pointer;
        transform: scale(1.2);
        margin-right: 8px;
    }
    .form-check-label {
        font-weight: 500;
    }

    /* Responsive tweaks */
    @media (max-width: 576px) {
        .card {
            max-width: 100%;
        }
    }
</style>
@endsection

         
                 
             
                
  
  

            

      





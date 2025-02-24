@extends('admin.layout')

@section('main_content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-4 align-items-center">
                <div class="col-md-12">
                    <h1 class="m-0 text-dark">Manage Dynamic Banners</h1>
                </div>
                <div class="col-md-12">
                    <ol class="breadcrumb float-md-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Dynamic Banners</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <!-- Banner List -->
        <div class="container mt-5">
    <div class="card shadow-lg border-light mx-auto">
    <div class="card-header d-flex justify-content-between align-items-center bg-dark text-white">
          <h3 class="card-title mb-0">ProductList</h3>
          <a href="{{route('admin.banner.index')}}" class="btn btn-primary btn-sm">Add New</a>
        </div>
        <div class="card shadow-lg border-light mb-4">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title mb-0">Existing Banners</h3>
            </div>
            <div class="card-body">
               
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Offer</th>
                                <th>Heading</th>
                                <th>Button</th>
                                <th>Button Title</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $banner_list as $key => $value)
                                <tr>
                                    <td>{{$value->id  }}</td>
                                    <td>{{ $value->offer }}</td>
                                    <td>{{ $value->heading }}</td>
                                    <td>{{ $value->button ? 'Yes' : 'No' }}</td>
                                    <td>{{ $value->button_heading }}</td>
                                    <td>
                                        @if($value->banner_image)
                                            <img src="{{ asset('uploads/banner/'. $value->banner_image) }}" alt="Banner Image" width="100">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.items.banneredit', $value->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.banner.destroy', $value->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this banner?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                
            </div>
        </div>

@endsection

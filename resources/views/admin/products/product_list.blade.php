@extends('admin.layout')
@section('main_content')
<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Page Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-4 align-items-center">
        <div class="col-md-6">
          <h1 class="m-0 text-dark">Product Management</h1>
        </div>
        <div class="col-md-6">
          <ol class="breadcrumb float-md-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Product List</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
<div class="container mt-5">
    <div class="card shadow-lg border-light mx-auto">
    <div class="card-header d-flex justify-content-between align-items-center bg-dark text-white">
          <h3 class="card-title mb-0">ProductList</h3>
          <a href="{{route('admin.product.index')}}" class="btn btn-primary btn-sm">Add New</a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>attribute</th>
                        <th>Price</th>
                        <th>Location</th>
                        <th>Image 1</th>
                        <th>Image 2</th>
                        <th>Image 3</th>
                        <th>Actions</th>
                    </tr>

                    @php
                        $i = 1;
                    @endphp
                </thead>
                <tbody>
             
                    @foreach($product as $key => $value)
                  
                    <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $value->product_name }}</td>
                            <td>{{ $value->description }}</td>
                            <td>{{ $value->category_name }}</td>
                            <td>{{ $value->subcategory_name }}</td>
                            <!-- <td>{{ $value->attribute }}</td> -->

                            <td>
                                    @php
                                        $attributes = json_decode($value->attribute, true);
                                    @endphp

                                    @if(is_array($attributes))
                                        @foreach($attributes as $attribute)
                                            <span style="font-weight:bold;">{{ key($attribute) }}</span>  : <span>{{ current($attribute) }} </span>&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endforeach
                                    @else
                                        <p>No attributes found.</p>
                                    @endif
                                </td>

                            <td>{{ $value->price }}</td>
                            <td>{{ $value->city }}</td>



                            <td>
                                  @if($value->image_1)
                                        <a href="{{ asset('uploads/product/' . $value->image_1) }}" data-lightbox="product-{{ $value->id }}" data-title="Image_1">
                                            <img src="{{ asset('uploads/products/' . $value->image_1) }}" alt="Image_1" style="width:40px; height: auto; cursor: pointer;">
                                        </a>
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    
                            <td>
                            @if($value->image_2)
                                        <a href="{{ asset('uploads/product/' . $value->image_2) }}" data-lightbox="product-{{ $value->id }}" data-title="Image_2">
                                            <img src="{{ asset('uploads/products/' . $value->image_2) }}" alt="Image_1" style="width:40px; height: auto; cursor: pointer;">
                                        </a>
                                        @else
                                            No Image
                                        @endif
                            </td>
                            <td>
                            @if($value->image_3)
                                        <a href="{{ asset('uploads/product/' . $value->image_3) }}" data-lightbox="product-{{ $value->id }}" data-title="Image_3">
                                            <img src="{{ asset('uploads/products/' . $value->image_3) }}" alt="Image_3" style="width:40px; height: auto; cursor: pointer;">
                                        </a>
                                        @else
                                            No Image
                                        @endif
                            </td>
                            <td>


                            <a href="{{ route('admin.product.edit', $value->id) }}" class="btn btn-xs btn-success">
                                <i class="fas fa-edit"></i> Edit
                            </a>


                    <form 
                    action="{{ route('admin.product.destroy', $value->id ) }}" 
                    method="POST" 
                    onsubmit="return confirm('Are you sure you want to delete this subcategory?');"
                  >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-xs btn-danger">
                    <i class="fa fa-trash"></i> 
                    </button>
                    </form>
                                <!-- <a href="{{  }}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a> -->
                            </td>
                                </tr>
                               
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
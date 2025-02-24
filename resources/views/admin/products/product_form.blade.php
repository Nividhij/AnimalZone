@extends('admin.layout')

@push('css')
<style>
    /* Custom Styles for Card Header Gradient */
    .bg-gradient {
        background: linear-gradient(to right, #007bff, #6c757d);
    }
</style>
@endpush

@section('main_content')
<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Page Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-4 align-items-center">
                <div class="col-md-12">
                    <h1 class="m-0 text-dark">Create Products</h1>
                </div>
                <div class="col-md-12">
                    <ol class="breadcrumb float-md-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Products</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Card -->
    <div class="container mt-12">
        <div class="card shadow-lg border-light mx-auto" >
            <!-- <div class="card-header bg-gradient text-white">
                <h3 class="card-title">Product Form</h3>
                <a href="{{route('admin.productlist.index')}}" class="btn btn-dark btn-sm">View list</a>
            </div> -->
            <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
        <h3 class="card-title mb-0">Product Form</h3>
        <a href="{{route('admin.productlist.index')}}" class="btn btn-dark btn-sm">View List</a>
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
                


                <form action="{{route('admin.product_submit')}}" method="post" id="productform" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">          
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input 
                                    type="text" 
                                    name="product_name" 
                                    id="product_name" 
                                    class="form-control @error('product_name') is-invalid @enderror" 
                                    placeholder="Enter product name"
                                >
                            @error('product_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-12">
    <div class="form-group">
        <label for="description" class="form-label">Description</label>
        <textarea 
            id="description" 
            name="description" 
            class="form-control @error('description') is-invalid @enderror" 
            placeholder="Enter a detailed description" 
            rows="4"
        ></textarea>
        @error('description')
        <span class="text-danger small">{{ $message }}</span>
        @enderror
    </div>
</div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cat_name">Category</label>
                                    <select name="cat_name" id="cat_name" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($sub as $value)
                                            <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('cat_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="sub_cat">Subcategory</label>
                                    <select name="sub_cat" id="sub_cat" class="form-control">
                                        <option value="">Select Subcategory</option>
                                    </select>
                                    @error('sub_cat')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row" id="attribute">

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price" value="{{old('price')}}">
                                    @error('price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="location">Product Location</label>
                         
                                    <select name="location"  class="form-control">
                                        <option value="">Select City</option>
                                        @foreach( $city as $value)
                                            <option value="{{ $value->id }}">{{ $value->city }}</option>
                                        @endforeach
                                    </select>
                
                            @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="imageone">Image 1</label>
                                    <input type="file" class="form-control" id="imageone" name="image_1" value="{{old('imageone')}}" onchange="previewImage(event)">
                                    @error('image_1')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 100%; display: none;" />
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="imagetwo">Image 2</label>
                                    <input type="file" class="form-control" id="imagetwo" name="image_2" value="{{old('imagetwo')}}" onchange="previewImagetwo(event)">
                                    @error('image_2')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <img id="imagePreviewtwo" src="#" alt="Image Preview" style="max-width: 100%; display: none;" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="imagethree">Image 3</label>
                                    <input type="file" class="form-control" id="imagethree" name="image_3" value="{{old('imagethree')}}" onchange="previewImagethree(event)">
                                    @error('image_3')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <img id="imagePreviewthree" src="#" alt="Image Preview" style="max-width: 100%; display: none;" />
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')
<script>
    $(document).ready(function(){
        $("#cat_name").change(function(){
            let value = $(this).val();
            $.ajax({
                url:"{{ route('admin.getSubcat') }}",
                method:"get",
                data:{
                    catid:value
                },
                success:function(res){
                   
                    let html  = '<option value="">Select Subcategory</option>';
                    res.result.forEach(element => {
                        html+="<option value='"+element.id+"'>"+element.subcategory_name+"</option>";
                    });
                    $("#sub_cat").html(html)
                }

            })
        })
    })
</script>



<script>
    $(document).ready(function(){
        $("#sub_cat").on('change',function(){
            let value = $(this).val();
            
            $.ajax({
                url:"{{ route('admin.getAttribute') }}",
                method:"get",
                data:{
                    sub_id : value
                },
                success:function(res){
                   console.log(res.result)
                    let html  = "";
                    res.result.forEach(element => {
                        console.log(element)
                        let name  = element.attribute_name;
                        let d_name = name.replace(" ","_");
                        html += '<div class="col-sm-12" col-md-12><div class="form-group"><label for="'+d_name+'">'+element.attribute_name+'</label><input type="text" name="'+d_name+'"  class="form-control" id="'+d_name+'" placeholder="enter '+element.attribute_name+'" name="'+d_name+'" required></div></div>';
                    });
                    $("#attribute").html(html);
                }

            });
        });
    });
</script>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>
<script>
    function previewImagetwo(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreviewtwo');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>
<script>
    function previewImagethree(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreviewthree');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>


<script>
    $(document).ready(function(){
        $("#productform").validate(
            {
                rules:{
                    product_name:{
                        required:true
                    },
                    cat_name:{
                        required:true,
                      
                    },
                    sub_cat:{
                        required:true,
                    },
                    price:{
                        required:true,
                    },
                    location:{
                        required:true,
                    },
                    image_1:{
                        required:true,
                    },
                }
            }
        );
    })
</script>

@endpush





  
  
  



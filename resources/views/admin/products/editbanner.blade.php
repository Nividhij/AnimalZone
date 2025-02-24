@extends('admin.layout')
@section('main_content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-4 align-items-center">
                <div class="col-md-12">
                    <h1 class="m-0 text-dark">Create Dynamic Banners</h1>
                </div>
                <div class="col-md-12">
                    <ol class="breadcrumb float-md-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Dynamic Banners</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-12">
        <div class="card shadow-lg border-light mx-auto">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title mb-0">Dynamic Banner Form</h3>
            </div>
            <div class="card-body">
                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Banner Form -->
                <form action="{{ route('admin.items.banneredited', $Banner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="bannerFields">
                        <div class="banner-field">
        
                            <div class="box-body">
                            <div class="form-group">
                                <label for="offer">Offer Text</label>
                                <input type="text" class="form-control" id="offer" placeholder="Enter Offer Text" name="offer" value="{{ $Banner->offer }}>
                                @error('offer')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>

                                <div class="form-group">
                                <label for="heading">Heading</label>
                                <input type="text" class="form-control" id="heading" placeholder="Enter Headig Text" name="heading" value="{{ $Banner->heading }}>
                                @error('heading')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="button">Button Show</label>
                                <select name="button" class="form-control" id="button">
                                    <option value="">Select Yes/No</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                @error('button')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="button_heading">Button Title</label>
                                <input type="text" class="form-control" id="button_heading" placeholder="Enter Button Title" name="button_heading"  value="{{ $Banner->button_heading }}">
                                @error('button_heading')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="banner_image">Banner Image</label>
                                <input type="file" class="form-control" id="banner_image" accept="image/*" name="banner_image" value="{{old('banner_image')}}">
                                @error('banner_image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                    <img id="banner_image" src="{{  asset('uploads/banner/' . $Banner->banner_image)   }}" alt="Image Preview" style="max-width: 50px; " />
                                </div>
        
                        </div>
                    </div>

                    <button type="button" id="addBannerField" class="btn btn-secondary">Add Banner</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection


@push('js')

<script>
    $(document).ready(function(){
        $(#bannerform).validate(
            {
                rules:{
                    offer:{
                        required:true
                    },
                    heading:{
                        required:true,
                      
                    },
                    button:{
                        required:true,
                    },
                    button_heading:{
                        required:true,
                    },
                    banner_image:{
                        required:true,
                    },
                }  
                  
            }
        );
    })
</script>
@endpush

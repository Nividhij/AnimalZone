@extends('frontweb.layoutweb')
@section('main')


<div class="rts-navigation-area-breadcrumb bg_light-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navigator-breadcrumb-wrapper">
                    <a href="{{ route('home') }}">Home</a>
                    <i class="fa-regular fa-chevron-right"></i>
                    <a class="current" href="#">Add Enquiry</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-seperator bg_light-1">
    <div class="container">
        <hr class="section-seperator">
    </div>
</div>

<div class="rts-register-area rts-section-gap bg_light-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="registration-wrapper-1">
                    <div class="logo-area mb--0">
                        <img class="mb--10" src="{{ asset('uploads\logo\logo2.png') }}" alt="logo" >
                    </div>
                    <h3 class="title">Add New Enquiry</h3>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('enquiries.store') }}" class="registration-form" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ request('product_id') }}">
                        <div class="input-wrapper">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your name" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        
                           


                        <div class="input-wrapper">
                            <label for="mobile">Mobile Number*</label>
                            <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}" placeholder="Enter mobile number" required>
                            @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-wrapper">
                            <label for="address">Address*</label>
                            <input type="text" id="address" name="address" value="{{ old('address') }}" placeholder="Enter address" required>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-wrapper">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" placeholder="Enter enquiry description">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                  

                        <button class="rts-btn btn-primary" type="submit">Submit Enquiry</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="rts-shorts-service-area rts-section-gap bg_primary">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="single-short-service-area-start">
                    <div class="icon-area">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="40" cy="40" r="40" fill="white"></circle>
                            <path d="M55.7029 25.2971C51.642 21.2363 46.2429 19 40.5 19C34.7571 19 29.358 21.2363 25.2971 25.2971C21.2364 29.358 19 34.7571 19 40.5C19 46.2429 21.2364 51.642 25.2971 55.7029C29.358 59.7637 34.7571 62 40.5 62C46.2429 62 51.642 59.7637 55.7029 55.7029C59.7636 51.642 62 46.2429 62 40.5C62 34.7571 59.7636 29.358 55.7029 25.2971ZM40.5 59.4805C30.0341 59.4805 21.5195 50.9659 21.5195 40.5C21.5195 30.0341 30.0341 21.5195 40.5 21.5195C50.9659 21.5195 59.4805 30.0341 59.4805 40.5C59.4805 50.9659 50.9659 59.4805 40.5 59.4805Z" fill="#629D23"></path>
                        </svg>
                    </div>
                    <div class="information">
                        <h4 class="title">Best Prices & Offers</h4>
                        <p class="disc">
                            We prepared special discounts for you on grocery products.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

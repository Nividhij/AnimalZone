@extends('admin.layout')
@section('main_content')
    <h2>Search Results for "{{ $query }}"</h2>

    @if ($results->isEmpty())
        <p>No results found.</p>
    @else
        <ul>
            @foreach ($results as $product)
                <li>{{ $product->name }} - {{ $product->category }} - {{ $product->brand }}</li>
            @endforeach
        </ul>
    @endif
@endsection

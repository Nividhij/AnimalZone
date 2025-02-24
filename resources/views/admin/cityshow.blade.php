@extends('admin.layout')
@section('main_content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cities</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <button class="btn btn-primary mb-3">
          <a href="{{ route('city.create') }}" style="color: white; text-decoration: none;">Add New</a>
        </button>

        <!-- Category Table -->
        <div class="card" style="padding: 10px;">
          <h2 class="mb-4">city Table</h2>
          @if(session('success'))
              <p class="alert alert-success">
                  {{ session('success') }}
              </P>
          @endif
          <table class="table table-striped">
            <thead class="thead-dark"> <!-- Added Bootstrap 'thead-dark' class -->
              <tr>
                <th>Id</th>
                <th>City</th>
               
                <th>Actions</th> <!-- Add an Actions column -->
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach($data as $key => $value)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $value->city }}</td>
                 
                  <td>
                    <!-- Edit Button -->
                    <a href="{{ route('city.edit', $value->id) }}" class="btn btn-warning">Edit</a>
                    <!-- Delete Button -->
                    <a href="{{ route('city.delete', $value->id) }}" class="btn btn-danger" onclick="return confirm('Do you really want to delete it?')">Delete</a>                   
                  </td>
                </tr>
                @php
                  $i++;
                @endphp
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

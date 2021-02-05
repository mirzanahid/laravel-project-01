
@extends('layouts.starlight')

@section('content')

@include('layouts.nav')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <a class="breadcrumb-item" href="index.html">Pages</a>
      <span class="breadcrumb-item active">Blank Page</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Blank Page</h5>
        <p>This is a starter page</p>
      </div><!-- sl-page-title -->
      <div class="container">
        <div class="row ">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Category List') }}</div>

                    <div class="card-body">
                        {{-- @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif --}}




                       <table class="table  table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Added By</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                          <tr>

                            <th > {{ $loop-> index +1 }}</th>
                            <td>{{ $category->cetegory_name }}</td>

                            <td>
                                {{ App\Models\User::find($category->added_by)->name }}
                                <br>

                                {{ App\Models\User::find($category->added_by)->email }}
                            </td>
                            <td>{{ $category->created_at->format('d/m/Y h:i:s A') }}


                            </td>
                            <td> <a href="{{ url('category/delete') }}/{{ $category->id }}" class="btn btn-danger btn-sm">Delete</a> </td>

                          </tr>
                          @endforeach
                        </tbody>
                      </table>



                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Add Category') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <form method="POST" action="{{ url('category/insert') }}">
                            @csrf


                            <div class="form-group">
                              <label >Category Name</label>

                              <input type="text" class="form-control" id="category_name" placeholder="" name="category_name">
                              @error('category_name')
                            <span class="text-danger"> {{ $message }}</span>

                            @enderror
                            </div>



                            <button type="submit" class="btn btn-success">Add Category</button>
                          </form>



                    </div>
                </div>
            </div>
        </div>
    </div>


    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->



@endsection

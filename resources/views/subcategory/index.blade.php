
@extends('layouts.starlight')

@section('content')

@include('layouts.nav')

<!-- ########## START: MAIN PANEL ########## -->
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
                    <div class="card-header">{{ __('Sub Category List') }}</div>

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
                            <th scope="col">Sub Category Name</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Added By</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($subcategories as $key=> $subcategory)
                          <tr>

                            <th > {{ $subcategories->firstItem() + $key}}</th>
                            <td>{{ $subcategory->sub_category_name }}</td>
                            <td>{{ App\Models\Cetegory::find($subcategory->category_id)->cetegory_name  }}</td>

                            <td>
                                {{ App\Models\User::find($subcategory->added_by)->name }}
                                <br>

                                {{ App\Models\User::find($subcategory->added_by)->email }}
                            </td>
                            <td>{{ $subcategory->created_at->format('d/m/Y h:i:s A') }}


                            </td>
                            <td>
                                <a href="{{  url('subcategory/delete') }}/{{$subcategory->id}}" class="btn btn-danger btn-sm">Delete</a>
                                {{-- <a href="#" class="btn btn-warning btn-sm mt-1">Edit</a> --}}

                             </td>

                          </tr>
                          @empty
                          <tr class="text-center">
                            <td colspan="50">No Data To Show</td>
                        </tr>
                          @endforelse


                        </tbody>
                      </table>
              {{ $subcategories-> links() }}


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Add Sub Category') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('error_status'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error_status') }}
                            </div>
                        @endif


                        <form method="POST" action="{{ url('subcategory/insert') }}">
                            @csrf

                            <div class="form-group">
                                <label >Select Category</label>

                               <select name="category_id" class="form-control"  >
                                <option value="">-Select One-</option>
                                @foreach ($categories as $category)
                                <option {{ (old('category_id') ==$category->id )? "selected": "" }} value="{{ $category->id }}">{{ $category->cetegory_name }}</option>

                                @endforeach


                               </select>
                               @error('category_id')
                               <span class="text-danger"> {{ $message }}</span>

                               @enderror

                              </div>
                            <div class="form-group">
                              <label >Sub Category Name</label>

                              <input type="text" class="form-control" placeholder="" name="sub_category_name" value="{{ old('sub_category_name') }}">
                              @error('sub_category_name')
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

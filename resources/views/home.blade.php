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
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif



                     <div class="alert alert-success">
                         <h4 class="text-center ">Total Users: {{ $users_count }}</h4>
                     </div>
                       <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created At</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                          <tr>

                            <th > {{ $loop-> index +1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d/m/Y h:i:s A') }}
                              <br>
                                <span class="badge badge-success">{{ $user->created_at->diffForHumans() }}</span>
                            </td>

                          </tr>
                          @endforeach
                        </tbody>
                      </table>



                    </div>
                </div>
            </div>
        </div>
    </div>


    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->










@endsection

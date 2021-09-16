@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $u )
                            <tr>
                                <td>{{$u->name}}</td>
                                <td><a class="btn btn-info"href="{{route('impersonate',$u->id)}}">View</a> </td>
                              </tr>
                            @endforeach

                              {{-- @dd(Auth::user()->id) --}}
                              @if(session('impersonated_by') )
                                <p>I am admin</p>
                                @endif
                        </tbody>
                      </table>
                      <a class="btn btn-info"href="">Read</a>
                      @if(!session('impersonated_by') )
                      <a class="btn btn-success"href="">Update</a>
                      <a class="btn btn-danger"href="">Delete</a>
                      @else
                      <a class="btn btn-success disabled"href="">Update</a>
                      <a class="btn btn-danger disabled"href="">Delete</a>
                      @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

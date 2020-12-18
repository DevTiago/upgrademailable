@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="login-wrapperd d-flex justify-content-center" >
                <form class="col-6" style="border: 1px solid grey; padding: 20px; margin-top: 20px;" method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="exampleInputUser" name="username" placeholder="Enter username" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Submit</button>
                    @if (session('msg'))
                        <div class="alert alert-danger mt-4">
                            {{ session('msg') }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    @endsection

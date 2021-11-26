@extends('layout')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h2>Registration Page</h2>
            </div>
            <div class="card-body">
                @if ($errors->any())
      <div class="alert alert-success">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
@endif
@if(session()->has('message'))
      <div class="alert alert-success">
          <li>{{ session('message') }}</li>
      </div>
@endif
                <form action="{{ route('register') }}" method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Password:</label>
                        <input type="password" placeholder="******" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Password:</label>
                        <input type="password" placeholder="******" name="password_confirmation" class="form-control">
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" value="Register" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection

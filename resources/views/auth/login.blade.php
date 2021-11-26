@extends('layout')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h2>Login Page</h2>
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
                <form action="{{ route('login') }}" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Password:</label>
                        <input type="password" placeholder="******" name="password" class="form-control">
                    </div>

                    {{ csrf_field() }}
                    <br>
                    <input type="submit" value="Login" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection

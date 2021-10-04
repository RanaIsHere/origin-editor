@extends('preload.default')

@section('container')
    <div class="container-fluid bg-light w-50" style="margin-top: 200px;">
        <form action="/" method="post">
            @csrf

            <div class="form-group mb-3">
                <label for="username" class="form-label"> Username </label>
                <input type="text" class="form-control" name="username" id="username">
            </div>

            <div class="form-group mb-3">
                <label for="password" class="form-label"> Password </label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <button type="submit" class="btn btn-primary"> Login </button>
        </form>
    </div>
@endsection
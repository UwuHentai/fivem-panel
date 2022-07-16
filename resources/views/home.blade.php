@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @guest
                @if (Route::has('login'))
                    <div>
                        <div class="text-light text-center">Please <button class="btn btn-sm btn-light"><a class="text-decoration-none text-dark" href="{{ route('login') }}">Login</a></button> to have full access!</div>
                        <div class="text-light text-center mt-2">Welcome to our panel!</div>
                    </div>
                @endif
            @else
                <div>
                    <div class="text-light text-center">Welcome to our panel <a class="text-success text-decoration-none" href="">{{Auth::user()->name}}</a> !</div>
                    <div class="col-md-4"></div>
                </div>
                
                @if (Auth::user()->administrator)
                    <div class="text-light text-center">You're <a class="text-danger text-decoration-none" href="">Admin</a> !</div>
                @endif
            @endguest
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 mt-5">
            <div class="text-light text-center">
                For the moment the home page is in development!
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-danger text-center">
            <h4>This page is in development</h4>    
            <p>
                <button class="btn btn-dark fs-4"><a class="text-decoration-none text-light" href="{{ route('admin.dashboard') }}">DASHBOARD</a></button>
            </p>
            <p>
                <button class="btn btn-primary fs-4"><a class="text-decoration-none text-light" href="https://discord.io/fivem-panel">Discord</a></button>
            </p>
        </div>
    </div>
@endsection
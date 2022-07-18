@extends('layouts.app')

@section('content')
<p style="display:none">{{$database = "Tables_in_" . env('DB_DATABASE')}}  </p>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                <div class="text-light text-center">Welcome to dashboard <a class="text-success text-decoration-none" href="">{{Auth::user()->name}}</a> !</div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 ">
            <div class="text-light text-center">
                For the moment the dashboard page is in development !
            </div>
            <div class="text-light text-center">
                Not all the options will <span class="text-danger">work</span> !
            </div>
            <div class="text-light text-center">
                For any <span class="text-danger">BUG/PROBLEM/ERROR</span> contact me on <a class="text-primary text-decoration-none" href="discord.io/fivem-panel">Discord</a> !
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 d-flex mt-5">
            <div class="col-sm-3">
                <div class="">    
                    <div class="text-light h4">Actions for FiveM-Panel!</div>
                    @foreach ($tables as $table)
                        @if (substr($table->$database, 0, 3) != "vrp" )
                            <div class="mt-2">
                                <p>
                                    <a class="btn btn-light" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        {{ str_replace('_', ' ', $table->$database); }}
                                    </a>
                                </p>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        <button class="btn btn-dark m-2">Ban Player</button>
                                        <button class="btn btn-dark m-2">Unban Player</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="text-light h4">Actions for FiveM-Server!</div>
                    @foreach ($tables as $table)
                        @if (substr($table->$database, 0, 3) == "vrp" )
                            <div class="mt-2">
                                <p>
                                    <a class="btn btn-light" data-bs-toggle="collapse" href="#collapseExample{{$table->$database}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        {{ str_replace('_', ' ', $table->$database); }}
                                    </a>
                                </p>
                                <div class="collapse" id="collapseExample{{$table->$database}}">
                                    @if ($table->$database == 'vrp_users')
                                        <div class="card card-body">
                                            <button class="btn btn-dark m-2" onclick="show_ban()">Ban Player</button>
                                            <button class="btn btn-dark m-2" onclick="show_unban()">Unban Player</button>
                                            <button class="btn btn-dark m-2" onclick="show_whitelist()">Whitelist Player</button>
                                            <button class="btn btn-dark m-2" onclick="show_unwhitelist()">Unwhitelist Player</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div> 
            <div class="col-sm-9"> 
                <div id="ban-user" style="display: none;">
                    <form class="m-5" action="{{ route('fivem-ban') }}" method="GET">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                BAN USER
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Pay <span class="text-danger">attention</span> the user will get banned but will not be kicked out from the server! </h5>
                                <p class="card-text">In the future versions will be.</p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">ID</span>
                                    <input name="id" type="text" class="form-control" placeholder="Player id" aria-label="1" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Reason</span>
                                    <input name="reason" type="text" class="form-control" placeholder="Ban reason" aria-label="Ban reason" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger mt-2">Submit</button>
                        </div>
                    </form>
                </div>
                <div id="unban-user" style="display: none;">
                    <form class="m-5" action="{{ route('fivem-unban') }}" method="GET">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                UNBAN USER
                            </div>
                            <div class="card-body">
                                {{--<h5 class="card-title">Pay <span class="text-danger">attention</span> the use will get banned but will not be kicked out from the server! </h5>--}}
                                {{--<p class="card-text">In the future versions will be.</p>--}}
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">ID</span>
                                    <input name="id" type="text" class="form-control" placeholder="Player id" aria-label="1" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Reason</span>
                                    <input name="reason" type="text" class="form-control" placeholder="Ban reason" aria-label="Ban reason" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger mt-2">Submit</button>
                        </div>
                    </form>
                </div>
                <div id="whitelist-user" style="display: none;">
                    <form class="m-5" action="{{ route('fivem-whitelist') }}" method="GET">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                WHITELIST USER
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Pay <span class="text-danger">attention</span> the user will get unwhitelisted but will not be kicked out from the server! </h5>
                                <p class="card-text">In the future versions will be.</p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">ID</span>
                                    <input name="id" type="text" class="form-control" placeholder="Player id" aria-label="1" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger mt-2">Submit</button>
                        </div>
                    </form>
                </div>
                <div id="unwhitelist-user" style="display: none;">
                    <form class="m-5" action="{{ route('fivem-unwhitelist') }}" method="GET">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                UNWHITELIST USER
                            </div>
                            <div class="card-body">
                                {{--<h5 class="card-title">Pay <span class="text-danger">attention</span> the use will get banned but will not be kicked out from the server! </h5>--}}
                                {{--<p class="card-text">In the future versions will be.</p>--}}
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">ID</span>
                                    <input name="id" type="text" class="form-control" placeholder="Player id" aria-label="1" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger mt-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

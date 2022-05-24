@extends('layouts.app')

@section('content')
<p style="display:none">{{$database = "Tables_in_" . env('DB_DATABASE')}}  </p>
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-12 d-flex">
            <div class="col-md-3 m-1">
                <div class="card">
                    <div class="card-header">{{ __('Database Tables') }}</div>
                    <div class="card-body">
                        <div id="accordion">
                            <div class="card">
                                @foreach($tables as $table)
                                    <div class="card-header" id="heading{{ $table->Tables_in_panel }}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-dark text-truncate" data-toggle="collapse" data-target="#collapse{{ $table->Tables_in_panel }}" aria-expanded="true" aria-controls="collapse{{ $table->Tables_in_panel }}">
                                                                                               
                                                {{ str_replace('_', ' ', $table->$database); }}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse{{ $table->Tables_in_panel }}" class="collapse" aria-labelledby="heading{{ $table->Tables_in_panel }}" data-parent="#accordion">
                                        <h5 class="m-3 h-4">Actions: </h5>
                                        <div class="card-body">
                                            @if ($table->Tables_in_panel == 'vrp_users')
                                                <button class="btn btn-info text-light ban-user">BAN</button> <br> <hr>
                                                <button class="btn btn-info text-light unban-user">UNBAN</button> <br> <hr>
                                                <button class="btn btn-info text-light whitelist-user">WHITELIST</button> <br> <hr>
                                                <button class="btn btn-info text-light unwhitelist-user">UNWHITELIST</button> <br> <hr>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 m-1">
                <div class="card">
                    <div class="card-header">{{ __('Database Tables') }}</div>

                    <div class="card-body">
                        <div id="accordion" class="mircea">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                    Actions
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body" id="actions_field">
                                        <div id="ban-user" style="display: none;">
                                            <form class="m-5" action="{{ route('ban.user') }}" method="GET">
                                                @csrf
                                                <h4>BAN</h4>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">@</span>
                                                    </div>
                                                    <input type="text" require name="id" class="form-control" placeholder="ID" aria-label="ID" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Reason</span>
                                                    </div>
                                                    <textarea require name="reason" class="form-control"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                        <div id="unban-user" style="display: none;">
                                            <form class="m-5" action="{{ route('unban.user')}}" method="GET">
                                                @csrf
                                                <h4>UNBAN</h4>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">@</span>
                                                    </div>
                                                    <input type="text" require name="id" class="form-control" placeholder="ID" aria-label="ID" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Reason</span>
                                                    </div>
                                                    <textarea require name="reason" class="form-control"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                        <div id="whitelist-user" style="display: none;">
                                            <form class="m-5" action="{{ route('whitelist.user')}}" method="GET">
                                                @csrf
                                                <h4>WHITELIST</h4>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">@</span>
                                                    </div>
                                                    <input type="text" require name="id" class="form-control" placeholder="ID" aria-label="ID" aria-describedby="basic-addon1">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                        <div id="unwhitelist-user" style="display: none;">
                                            <form class="m-5" action="{{ route('unwhitelist.user')}}" method="GET">
                                                @csrf
                                                <h4>UNWHITELIST</h4>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">@</span>
                                                    </div>
                                                    <input type="text" require name="id" class="form-control" placeholder="ID" aria-label="ID" aria-describedby="basic-addon1">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

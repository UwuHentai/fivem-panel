@extends('layouts.app')

@section('content')
<p style="display:none">{{$database = "Tables_in_" . env('DB_DATABASE')}}  </p>
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-12 d-flex">
            <div class="col-md-4 m-1">
                <div class="card">
                    <div class="card-header">{{ __('Database Tables') }}</div>
                    <div class="card-body">
                        <div id="accordion">
                            <div class="card">
                                @foreach($tables as $table)
                                    <div class="card-header" id="heading{{ $table->$database }}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-dark text-truncate" data-toggle="collapse" data-target="#collapse{{ $table->$database }}" aria-expanded="true" aria-controls="collapse{{ $table->$database }}">
                                                                                               
                                                {{ str_replace('_', ' ', $table->$database); }}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse{{ $table->$database }}" class="collapse" aria-labelledby="heading{{ $table->$database }}" data-parent="#accordion">
                                        <h5 class="m-3 h-4">Actions: </h5>
                                        <div class="card-body">
                                            @if ($table->$database == 'vrp_users')
                                                <div class="d-flex">
                                                    <button class="btn btn-info btn-sm m-1 text-light ban-user">BAN</button>
                                                    <button class="btn btn-info btn-sm m-1 text-light unban-user">UNBAN</button>
                                                </div>
                                                <hr>
                                                <div class="d-flex">
                                                    <button class="btn btn-info btn-sm m-1 text-light whitelist-user">WHITELIST</button>
                                                    <button class="btn btn-info btn-sm m-1 text-light unwhitelist-user">UNWHITELIST</button>
                                                </div>
                                            @elseif ($table->$database == "vrp_user_moneys")
                                                <div class="d-flex">
                                                    <button class="btn btn-info btn-sm m-1 text-light add-money-user-wallet">ADD MONEY WALLET</button>
                                                    <button class="btn btn-info btn-sm m-1 text-light remove-money-user-wallet">REMOVE MONEY WALLET</button>
                                                </div>
                                                <hr>
                                                <div class="d-flex">
                                                    <button class="btn btn-info btn-sm m-1 text-light add-money-user-bank">ADD MONEY BANK</button>
                                                    <button class="btn btn-info btn-sm m-1 text-light remove-money-user-bank">REMOVE MONEY BANK</button>
                                                </div>
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

                                        <div id="add-money-user-wallet" style="display: none;">
                                            <form class="m-5" action="{{ route('addmoneywallet.user')}}" method="GET">
                                                @csrf
                                                <h4>ADD MONEY WALLET</h4>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">@</span>
                                                    </div>
                                                    <input type="text" require name="id" class="form-control" placeholder="ID" aria-label="ID" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Money</span>
                                                    </div>
                                                    <input type="text" require name="money" class="form-control" placeholder="Ex: 1000" aria-label="Ex: 1000" aria-describedby="basic-addon1">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>

                                        <div id="remove-money-user-wallet" style="display: none;">
                                            <form class="m-5" action="{{ route('removemoneywallet.user')}}" method="GET">
                                                @csrf
                                                <h4>REMOVE MONEY WALLET</h4>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">@</span>
                                                    </div>
                                                    <input type="text" require name="id" class="form-control" placeholder="ID" aria-label="ID" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Money</span>
                                                    </div>
                                                    <input type="text" require name="money" class="form-control" placeholder="Ex: 1000" aria-label="Ex: 1000" aria-describedby="basic-addon1">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>

                                        <div id="add-money-user-bank" style="display: none;">
                                            <form class="m-5" action="{{ route('addmoneybank.user')}}" method="GET">
                                                @csrf
                                                <h4>ADD MONEY BANK</h4>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">@</span>
                                                    </div>
                                                    <input type="text" require name="id" class="form-control" placeholder="ID" aria-label="ID" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Money</span>
                                                    </div>
                                                    <input type="text" require name="money" class="form-control" placeholder="Ex: 1000" aria-label="Ex: 1000" aria-describedby="basic-addon1">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>

                                        <div id="remove-money-user-bank" style="display: none;">
                                            <form class="m-5" action="{{ route('removemoneybank.user')}}" method="GET">
                                                @csrf
                                                <h4>REMOVE MONEY BANK</h4>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">@</span>
                                                    </div>
                                                    <input type="text" require name="id" class="form-control" placeholder="ID" aria-label="ID" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Money</span>
                                                    </div>
                                                    <input type="text" require name="money" class="form-control" placeholder="Ex: 1000" aria-label="Ex: 1000" aria-describedby="basic-addon1">
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

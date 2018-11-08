@extends('layouts.app')

@section('content')
<div class="container dashboard">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <h2 class="mt-3 mb-4">Available Reports</h2>

    <div class="row">
        @foreach($reports as $report)
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <a href="#{{ $report->id }}">{{  $report->name }}</a>
                    </div>

                    <div class="card-footer">
                        <a href="#" class="btn btn-sm btn-outline-info">Use it!</a>
                        <a href="#" class="btn btn-sm btn-outline-info m-auto">Edit</a>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h2 class="mt-4 mb-4">Available Websites</h2>

    <div class="row">
        @foreach($websites as $website)
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <a href="#{{ $website->id }}">
                            <h4>{{  $website->name }}</h4>
                            {{  $website->domain }}<br>
                        </a>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-sm btn-outline-info">Visit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

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
                        <h5 class="m-0"><a href="#{{ $report->id }}">{{  $report->name }}</a></h5>
                    </div>

                    <div class=" card-footer">
                        <div class="row">
                            <div class="col-7 mr-auto">
                                <a href="#" class="btn btn-sm btn-outline-info">See it!</a>
                            </div>

                            <div class="col-5`">
                                <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-sm btn-outline-default m-auto">edit</a>
                            </div>
                        </div>
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
                        <h5 class="mb-0">{{  $website->name }}</h5>
                        {{  $website->domain }}
                    </div>
                    <div class="card-footer">
                        <a
                            href="{{ 'http://' . $website->domain }}"
                            target="_blank"
                            class="btn btn-sm btn-outline-info"
                        >Visit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

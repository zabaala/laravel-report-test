@extends('layouts.app')

<?php
$editing = $report && !empty($report->id);

$formAction = $editing ? route('reports.update', $report->id) : route('reports.store');

$name = $editing ? $report->name : '';
$model = $editing ? $report->model : '';
$created_at = $editing ? $report->created_at : '';
$updated_at = $editing ? $report->updated_at : '';

?>

@section('content')
    <div class="container">
        <h2 class="mb-4 mt-4">
            Report (edit)
            @if(isset($report->id))
                <a href="{{ route('reports.show', $report->id) }}" target="_blank" class="btn float-right">See report</a>
            @endif
        </h2>

        <form action="{{ $formAction }}" method="post" id="form">
            @csrf

            @if($editing)
                @method('PUT')
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-3">
                                    <label for="created_at">Created At</label>
                                    <input type="text" id="created_at" readonly class="form-control-plaintext" value="{{ $created_at }}">
                                </div>

                                <div class="form-group col-3">
                                    <label for="updated_at">Updated At</label>
                                    <input type="text" id="updated_at" readonly class="form-control-plaintext" value="{{ $updated_at }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input id="name" name="name" value="{{ $name }}" required class="form-control">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="model">Model:</label>
                                        <select name="model" id="model" class="form-control">
                                            <option value="n">Choose a option...</option>
                                            @foreach($models as $key => $value)
                                                <option
                                                    value="{{ $key }}" {{ $model === $key ? 'selected' : '' }}
                                                >{{ ucfirst($key) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <hr>

                <div class="card-body pt-0 pb-0">
                    <h3 class="text-center">Criteria</h3>
                    <div class="text-center">
                        <div id="meta-select-container" class="text-center w-50 ml-auto mr-auto">
                            <small>
                                Select a model to continue...
                            </small>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="class-body container">
                    <div class="row" id="criteria-container"></div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-lg btn-success">Save</button>
                    <a href="{{ route('reports.index') }}" class="btn">back</a>
                    @if(isset($report->id))
                        <button type="button" id="delete" class="btn btn-lg btn-outline-danger float-right">Delete</button>
                    @endif
                </div>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <script>
        const Report = {
            id: {!! isset($report) ? $report->id  : "''" !!},
            criteria: {!! isset($report) ? json_encode(unserialize($report->criteria)) : "''" !!}
        };
    </script>

    <script type="module" src="{{ asset('js/report/report.js') }}"></script>
@endsection
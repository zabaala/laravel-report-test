@extends('layouts.app')

<?php
$editing = $report && !empty($report->id);

$name = $editing ? $report->name : '';
$created_at = $editing ? $report->created_at : '';
$updated_at = $editing ? $report->updated_at : '';
?>

@section('content')
    <div class="container">
        <h2 class="mb-4 mt-4">Report (edit)</h2>
        <form action="?" method="post">
            @csrf

            @if($editing)
                @method('PUT')
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="created_at">Created At</label>
                                    <input type="text" id="created_at" readonly class="form-control-plaintext" value="{{ $created_at }}">
                                </div>

                                <div class="form-group col-6">
                                    <label for="updated_at">Updated At</label>
                                    <input type="text" id="updated_at" readonly class="form-control-plaintext" value="{{ $updated_at }}">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input id="name" name="name" value="{{ $name }}" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>Choose a model to see all your related metas.</p>

                            <select name="model_id" id="model_id" class="form-control mt-3" required>
                                <option value="n">Choose a model...</option>
                                @foreach($availableModels as $model)
                                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                                @endforeach
                            </select>

                            <div id="metas-list"></div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-lg btn-success">Save</button>
                    <a href="{{ route('manager.reports.index') }}" class="btn">back</a>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/reports.js') }}"></script>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-4 mb-4">
            Report: #{{ $report->id }} - {{ $report->name }}
            <a href="{{ route('reports.index') }}" class="btn float-right">back</a>
        </h2>

        <h2 class="mt-4 mb-4">Result:</h2>

        <div class="card">
            <div class="card-body">
<pre>
<?php var_dump($results); ?>
</pre>
            </div>
        </div>

        </div>
@endsection

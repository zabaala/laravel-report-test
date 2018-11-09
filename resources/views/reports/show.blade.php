@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-4 mb-4">
            Report: #{{ $report->id }} - {{ $report->name }}
            <a href="{{ route('reports.index') }}" class="btn float-right">back</a>
        </h2>

        @if(! $model)
            <div class="card">
                <div class="card-body text-center">

                    <div class="form-group col-6 offset-3">
                        <label for="model">Please... To continue, choose a available Model to this report.</label>
                        <select name="model" id="model" class="form-control form-control-lg mt-4" onchange="location.href = '?model=' + this.options[this.selectedIndex].value">
                            <option value="">choose...</option>
                            @foreach($models  as $m)
                                <option value="{{ $m }}">{{ $m }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
        @else

            <div class="card">
                <form action="?">
                    <input type="hidden" name="model" value="{{ $model }}">
                    <input type="hidden" name="build" value="true">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="keyword">Keyword:</label>
                                    <input name="keyword" id="keyword" class="form-control form-control-lg">
                                </div>
                            </div>
                        </div>

                        <h3>
                            Criteria:
                            <a class="btn btn-sm btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">choose...</a>
                            <div class="dropdown-menu">
                                @foreach($metas as $meta)
                                    <a class="dropdown-item meta"
                                       href="#"
                                       data-id="{{ $meta->id }}"
                                       data-type="{{ $meta->type }}"
                                       data-label="{{ $meta->label }}"
                                    >
                                        {{ $meta->label }}
                                    </a>
                                @endforeach
                            </div>
                        </h3>

                        <hr>

                        <div class="row" id="criteria-container"></div>

                    </div>

                    <div class="card-footer">
                        <button class="btn btn-sm btn-success">Filter</button>
                        <a href="{{ route('reports.show', $report->id) }}" class="btn">clear</a>
                    </div>
                </form>
            </div>

        <h2 class="mt-4 mb-4">Result:</h2>

        <div class="card">
            <div class="card-body">
<pre>
<?php var_dump($results); ?>
</pre>
            </div>
        </div>

        </div>
    @endif
@endsection

@section('scripts')
    <script type="module" src="{{ asset('js/report/report.js') }}"></script>
@endsection
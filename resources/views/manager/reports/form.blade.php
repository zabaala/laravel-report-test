@extends('layouts.app')

<?php
$editing = $report && !empty($report->id);

$formAction = $editing ? route('manager.reports.update', $report->id) : route('manager.reports.store');

$name = $editing ? $report->name : '';
$created_at = $editing ? $report->created_at : '';
$updated_at = $editing ? $report->updated_at : '';
?>

@section('content')
    <div class="container">
        <h2 class="mb-4 mt-4">Report (edit)</h2>

        <form action="{{ $formAction }}" method="post" id="form">
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
                            <h5>Metas</h5>

                            <p>Choose metas that will be related with this report.</p>

                                <?php $lastModel = null; ?>

                                @foreach($metas as $meta)

                                    <?php
                                        $isSelectedMeta = function ($item) use ($meta) {
                                            return $item == $meta->id;
                                        };
                                    ?>

                                    @if($meta->model !== $lastModel)
                                        <strong>{{ ucfirst($meta->model) }} Model:</strong>
                                    @endif

                                    <?php $lastModel = $meta->model; ?>

                                    <div class="form-check">
                                        <input
                                            type="checkbox"
                                            name="meta_id[]"
                                            id="meta_id_{{$meta->id}}"
                                            value="{{$meta->id}}"
                                            class="form-check-input"
                                            {{ $editing && $selectedMetas->contains($isSelectedMeta) ? 'checked' : '' }}
                                        >
                                        <label for="meta_id_{{$meta->id}}">
                                            {{ $meta->id }} - {{ $meta->label }}: {{ $meta->type }}
                                        </label>
                                    </div>
                                @endforeach
                            <div id="metas-list"></div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-lg btn-success">Save</button>
                    <a href="{{ route('manager.reports.index') }}" class="btn">back</a>
                    <button type="button" id="delete" class="btn btn-lg btn-outline-danger float-right">Delete</button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <script>
        document.getElementById('delete').addEventListener('click', e => {
            e.preventDefault();
            document.querySelector('input[name="_method"]').value = 'DELETE';
            document.getElementById('form').submit();
        });
    </script>
@endsection
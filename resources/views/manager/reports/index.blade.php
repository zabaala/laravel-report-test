@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-4 mb-4">Reports</h2>

        <div class="row">
            <div class="col-12">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Report</th>
                            <th width="15%">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($reports as $report)
                        <tr>
                            <td>{{ $report->id }}</td>
                            <td>{{ $report->name }}</td>
                            <td>
                                <a
                                    href="{{ route('manager.reports.edit', $report->id) }}"
                                    class="btn btn-sm btn-outline-info"
                                >edit</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
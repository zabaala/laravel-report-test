<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Active?</th>
            <th>Name</th>
            <th>Domain</th>
            <th width="15%">Created At</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach($results as $site)
            <tr>
                <td>{{ $site->id }}</td>
                <td>{{ $site->active }}</td>
                <td>{{ $site->name }}</td>
                <td>{{ $site->domain }}</td>
                <td nowrap>{{ $site->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
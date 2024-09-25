<table class="table">
    <thead>
        <tr>
            <th>
                <a href="{{ route('training_session.index', ['sortField' => 'name', 'sortDirection' => ($sortField == 'name' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                    Name
                </a>
            </th>
            <th>
                <a href="{{ route('training_session.index', ['sortField' => 'session_date', 'sortDirection' => ($sortField == 'session_date' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                    Session Date
                </a>
            </th>
            <th>
                <a href="{{ route('training_session.index', ['sortField' => 'price', 'sortDirection' => ($sortField == 'price' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                    Price
                </a>
            </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($trainingSessions as $session)
            <tr>
                <td>{{ $session->name }}</td>
                <td>{{ $session->session_date->format('Y-m-d H:i') }}</td>
                <td>{{ $session->price }}</td>
                <td>
                    <a href="{{ route('training_session.edit', $session->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('training_session.destroy', $session->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

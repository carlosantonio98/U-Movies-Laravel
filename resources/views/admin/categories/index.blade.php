<a href="{{ route('admin.categories.create') }}">New category</a>
<div>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <a href="{{ route('admin.categories.show', $category) }}">View</a>
                        <a href="{{ route('admin.categories.edit', $category) }}">Edit</a>
                        
                        {!! Form::open(['route' => ['admin.categories.destroy', $category], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Empty table</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
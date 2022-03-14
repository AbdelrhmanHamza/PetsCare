<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
        <tr>
            <th>User Name</th>
        <th>Email</th>
        <th>Type</th>
        <th>Password</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $users)
            <tr>
                <td>{{ $users->user_name }}</td>
            <td>{{ $users->email }}</td>
            <td>{{ $users->type }}</td>
            <td>{{ $users->password }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['users.destroy', $users->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('users.show', [$users->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('users.edit', [$users->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

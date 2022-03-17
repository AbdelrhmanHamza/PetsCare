<div class="table-responsive">
    <table class="table" id="clientProfiles-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>User Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Phone Number</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clientProfiles as $clientProfile)
            <tr>
                <td>{{ $clientProfile->id }}</td>
            <td>{{ $clientProfile->user_id }}</td>
            <td>{{ $clientProfile->first_name }}</td>
            <td>{{ $clientProfile->last_name }}</td>
            <td>{{ $clientProfile->address }}</td>
            <td>{{ $clientProfile->phone_number }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['clientProfiles.destroy', $clientProfile->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clientProfiles.show', [$clientProfile->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('clientProfiles.edit', [$clientProfile->id]) }}"
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

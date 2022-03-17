<div class="table-responsive">
    <table class="table" id="businessProfiles-table">
        <thead>
        <tr>
            <th>User Id</th>
        <th>Business Type</th>
        <th>Business Name</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Service Description</th>
        <th>Open At</th>
        <th>Close At</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($businessProfiles as $businessProfile)
            <tr>
                <td>{{ $businessProfile->user_id }}</td>
            <td>{{ $businessProfile->business_type }}</td>
            <td>{{ $businessProfile->business_name }}</td>
            <td>{{ $businessProfile->address }}</td>
            <td>{{ $businessProfile->phone_number }}</td>
            <td>{{ $businessProfile->service_description }}</td>
            <td>{{ $businessProfile->open_at }}</td>
            <td>{{ $businessProfile->close_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['businessProfiles.destroy', $businessProfile->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('businessProfiles.show', [$businessProfile->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('businessProfiles.edit', [$businessProfile->id]) }}"
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

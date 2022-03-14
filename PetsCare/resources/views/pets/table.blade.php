<div class="table-responsive">
    <table class="table" id="pets-table">
        <thead>
        <tr>
            <th>Client Profile Id</th>
        <th>Pet Type</th>
        <th>Pet Breed</th>
        <th>Pet Age</th>
        <th>Has Medical Condition</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pets as $pets)
            <tr>
                <td>{{ $pets->client_profile_id }}</td>
            <td>{{ $pets->pet_type }}</td>
            <td>{{ $pets->pet_breed }}</td>
            <td>{{ $pets->pet_age }}</td>
            <td>{{ $pets->has_medical_condition }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['pets.destroy', $pets->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pets.show', [$pets->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('pets.edit', [$pets->id]) }}"
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

<div class="table-responsive">
    <table class="table" id="subscribtionPackages-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Subscribtion Package Name</th>
        <th>Subscribtion Package Description</th>
        <th>Activation Period</th>
        <th>Subscribtion Package Price</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subscribtionPackages as $subscribtionPackage)
            <tr>
                <td>{{ $subscribtionPackage->id }}</td>
            <td>{{ $subscribtionPackage->subscribtion_package_name }}</td>
            <td>{{ $subscribtionPackage->subscribtion_package_description }}</td>
            <td>{{ $subscribtionPackage->activation_period }}</td>
            <td>{{ $subscribtionPackage->subscribtion_package_price }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['subscribtionPackages.destroy', $subscribtionPackage->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('subscribtionPackages.show', [$subscribtionPackage->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('subscribtionPackages.edit', [$subscribtionPackage->id]) }}"
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

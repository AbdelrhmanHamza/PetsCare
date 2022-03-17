<div class="table-responsive">
    <table class="table" id="servicePackages-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Package Name</th>
        <th>Package Description</th>
        <th>Package Price</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($servicePackages as $servicePackage)
            <tr>
                <td>{{ $servicePackage->id }}</td>
            <td>{{ $servicePackage->package_name }}</td>
            <td>{{ $servicePackage->package_description }}</td>
            <td>{{ $servicePackage->package_price }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['servicePackages.destroy', $servicePackage->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('servicePackages.show', [$servicePackage->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('servicePackages.edit', [$servicePackage->id]) }}"
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

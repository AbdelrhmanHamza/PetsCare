<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $servicePackage->id }}</p>
</div>

<!-- Package Name Field -->
<div class="col-sm-12">
    {!! Form::label('package_name', 'Package Name:') !!}
    <p>{{ $servicePackage->package_name }}</p>
</div>

<!-- Package Description Field -->
<div class="col-sm-12">
    {!! Form::label('package_description', 'Package Description:') !!}
    <p>{{ $servicePackage->package_description }}</p>
</div>

<!-- Package Price Field -->
<div class="col-sm-12">
    {!! Form::label('package_price', 'Package Price:') !!}
    <p>{{ $servicePackage->package_price }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $servicePackage->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $servicePackage->updated_at }}</p>
</div>


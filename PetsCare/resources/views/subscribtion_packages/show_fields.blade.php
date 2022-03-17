<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $subscribtionPackage->id }}</p>
</div>

<!-- Subscribtion Package Name Field -->
<div class="col-sm-12">
    {!! Form::label('subscribtion_package_name', 'Subscribtion Package Name:') !!}
    <p>{{ $subscribtionPackage->subscribtion_package_name }}</p>
</div>

<!-- Subscribtion Package Description Field -->
<div class="col-sm-12">
    {!! Form::label('subscribtion_package_description', 'Subscribtion Package Description:') !!}
    <p>{{ $subscribtionPackage->subscribtion_package_description }}</p>
</div>

<!-- Activation Period Field -->
<div class="col-sm-12">
    {!! Form::label('activation_period', 'Activation Period:') !!}
    <p>{{ $subscribtionPackage->activation_period }}</p>
</div>

<!-- Subscribtion Package Price Field -->
<div class="col-sm-12">
    {!! Form::label('subscribtion_package_price', 'Subscribtion Package Price:') !!}
    <p>{{ $subscribtionPackage->subscribtion_package_price }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $subscribtionPackage->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $subscribtionPackage->updated_at }}</p>
</div>


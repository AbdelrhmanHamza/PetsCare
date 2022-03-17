<!-- Package Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('package_name', 'Package Name:') !!}
    {!! Form::text('package_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Package Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('package_description', 'Package Description:') !!}
    {!! Form::textarea('package_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Package Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('package_price', 'Package Price:') !!}
    {!! Form::number('package_price', null, ['class' => 'form-control']) !!}
</div>
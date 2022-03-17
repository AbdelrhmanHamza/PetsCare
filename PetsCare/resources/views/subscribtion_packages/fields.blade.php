<!-- Subscribtion Package Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subscribtion_package_name', 'Subscribtion Package Name:') !!}
    {!! Form::text('subscribtion_package_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Subscribtion Package Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('subscribtion_package_description', 'Subscribtion Package Description:') !!}
    {!! Form::textarea('subscribtion_package_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Activation Period Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activation_period', 'Activation Period:') !!}
    {!! Form::number('activation_period', null, ['class' => 'form-control']) !!}
</div>

<!-- Subscribtion Package Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subscribtion_package_price', 'Subscribtion Package Price:') !!}
    {!! Form::number('subscribtion_package_price', null, ['class' => 'form-control']) !!}
</div>
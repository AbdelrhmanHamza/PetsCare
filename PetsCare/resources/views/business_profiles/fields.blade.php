<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', $users,null, ['class' => 'form-control']) !!}
</div>

<!-- Business Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('business_name', 'Business Name:') !!}
    {!! Form::text('business_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Business Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('business_type', 'Business Type') !!}
    {!! Form::select('business_type', ['vet'=>'vet','ranch'=> 'ranch'
        ,'hotel'=>'hotel','private'=>'private'],null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::number('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Service Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('service_description', 'Service Description:') !!}
    {!! Form::textarea('service_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Open At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('open_at', 'Open At:') !!}
    {!! Form::text('open_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Close At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('close_at', 'Close At:') !!}
    {!! Form::text('close_at', null, ['class' => 'form-control']) !!}
</div>
<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $businessProfile->user_id }}</p>
</div>

<!-- Business Type Field -->
<div class="col-sm-12">
    {!! Form::label('business_type', 'Business Type:') !!}
    <p>{{ $businessProfile->business_type }}</p>
</div>

<!-- Business Name Field -->
<div class="col-sm-12">
    {!! Form::label('business_name', 'Business Name:') !!}
    <p>{{ $businessProfile->business_name }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $businessProfile->address }}</p>
</div>

<!-- Phone Number Field -->
<div class="col-sm-12">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    <p>{{ $businessProfile->phone_number }}</p>
</div>

<!-- Service Description Field -->
<div class="col-sm-12">
    {!! Form::label('service_description', 'Service Description:') !!}
    <p>{{ $businessProfile->service_description }}</p>
</div>

<!-- Open At Field -->
<div class="col-sm-12">
    {!! Form::label('open_at', 'Open At:') !!}
    <p>{{ $businessProfile->open_at }}</p>
</div>

<!-- Close At Field -->
<div class="col-sm-12">
    {!! Form::label('close_at', 'Close At:') !!}
    <p>{{ $businessProfile->close_at }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $businessProfile->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $businessProfile->updated_at }}</p>
</div>


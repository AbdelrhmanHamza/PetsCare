<!-- Client Profile Id Field -->
<div class="col-sm-12">
    {!! Form::label('client_profile_id', 'Client Profile Id:') !!}
    <p>{{ $pets->client_profile_id }}</p>
</div>

<!-- Pet Type Field -->
<div class="col-sm-12">
    {!! Form::label('pet_type', 'Pet Type:') !!}
    <p>{{ $pets->pet_type }}</p>
</div>

<!-- Pet Breed Field -->
<div class="col-sm-12">
    {!! Form::label('pet_breed', 'Pet Breed:') !!}
    <p>{{ $pets->pet_breed }}</p>
</div>

<!-- Pet Age Field -->
<div class="col-sm-12">
    {!! Form::label('pet_age', 'Pet Age:') !!}
    <p>{{ $pets->pet_age }}</p>
</div>

<!-- Has Medical Condition Field -->
<div class="col-sm-12">
    {!! Form::label('has_medical_condition', 'Has Medical Condition:') !!}
    <p>{{ $pets->has_medical_condition }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $pets->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $pets->updated_at }}</p>
</div>


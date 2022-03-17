<!-- Client Profile Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_profile_id', 'Client Profile Id:') !!}
    {!! Form::number('client_profile_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Pet Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pet_type', 'Pet Type:') !!}
    {!! Form::text('pet_type', null, ['class' => 'form-control']) !!}
</div>


<!-- Pet Breed Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pet_breed', 'Pet Breed:') !!}
    {!! Form::text('pet_breed', null, ['class' => 'form-control']) !!}
</div>

<!-- Pet Age Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pet_age', 'Pet Age:') !!}
    {!! Form::text('pet_age', null, ['class' => 'form-control','id'=>'pet_age']) !!}
</div>
<!-- has medical condition Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_medical_condition', 'Has medical condition:') !!}
    {!! Form::select('has_medical_condition', ['no','yes'],null, ['class' => 'form-control']) !!}
</div>


@push('page_scripts')
    <script type="text/javascript">
        $('#pet_age').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush
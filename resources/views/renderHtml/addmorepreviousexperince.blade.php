<div class="row" id = "{{$x}}">
    <div class="col-md-6">
        {!! Form::select('previous_country_id[]', \App\Models\Country::selectbox(),null,['class' => 'form-control']) !!}
    </div>
    <div class="col-md-5">
        <input type="number" class="form-control" name="previous_contract[]">
    </div>
    <div class="col-md-1">
        <button class="btn btn-danger" onclick="return remove_add_more_field({{$x}})">X</button>
    </div>
</div>
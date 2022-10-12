<div>
    {!! Form::label('page', 'Url page') !!}
    {!! Form::Url('page', null, ['placeholder' => 'Insert url page']) !!}

    @error('page')
        <small><b>{{ $message }}</b></small>
    @enderror
</div>

<div>
    {!! Form::label('supplier', 'Supplier') !!}
    {!! Form::select('supplier', $suppliers, 1) !!}

    @error('supplier')
        <small><b>{{ $message }}</b></small>
    @enderror
</div>
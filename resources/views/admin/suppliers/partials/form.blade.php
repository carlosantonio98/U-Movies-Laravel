<!-- Name -->
<div class="form-group-custom">

    {!! Form::label('name', 'Nombre', [ 'class' => 'form-label-custom' ]) !!}

    {!! Form::text('name', null, [ 'class' => 'form-input-custom', 'placeholder' => 'Ingrese una proveedor' ]) !!}

    @error('name')
        <small class="form-error-custom">{{ $message }}</small>
    @enderror

</div>

<!-- Slug -->
<div class="form-group-custom">

    {!! Form::label('slug', 'Slug', [ 'class' => 'form-label-custom' ]) !!}

    {!! Form::text('slug', null, [ 'class' => 'form-input-custom', 'placeholder' => 'Ingrese un slug', 'readonly' ]) !!}

    @error('slug')
        <small class="form-error-custom">{{ $message }}</small>
    @enderror

</div>

<!-- Image logo -->
<div class="form-group-custom">

    <label class="form-label-custom">Previsualización del logo</label>

    <div class="flex justify-center w-full h-48 p-5 mt-1 mb-4 rounded overflow-hidden border border-gray-400 bg-[#24262d]">
        <img class="w-[160px] h-full object-cover" src="{{ isset($supplier) ? Storage::url($supplier->logo) : 'https://cdn.pixabay.com/photo/2022/08/03/08/11/little-boom-7362108_960_720.jpg' }}" id="pictureLogo">
    </div>

</div>

<div class="form-group-custom">

    {!! Form::label('logo', 'Logo del proveedor', [ 'class' => 'form-label-custom' ]) !!}

    {!! Form::file('logo', [ 'class' => 'form-input-custom', 'accept' => 'image/*' ]) !!}

    @error('logo')
        <small class="form-error-custom">{{ $message }}</small>
    @enderror

</div>

<!-- Checkboxs -->
<div class="form-group-custom flex items-center">

    <div>
        <label class="text-gray-400">            

            {!! Form::checkbox('allow_see', 2, isset($supplier) ?  ($supplier->allow_see == 1 ? 0 : 1) : 0) !!}
            <span class="ml-2">Permite ver?</span>

        </label>

        @error('allow_see')
            <small class="form-error-custom">{{ $message }}</small>
        @enderror
    </div>

    <div class="ml-4">
        <label class="text-gray-400">            

            {!! Form::checkbox('allow_download', 2, isset($supplier) ?  ($supplier->allow_download == 1 ? 0 : 1) : 0 ) !!}
            <span class="ml-2">Permite descargar?</span>

        </label>

        @error('allow_download')
            <small class="form-error-custom">{{ $message }}</small>
        @enderror
    </div>

</div>
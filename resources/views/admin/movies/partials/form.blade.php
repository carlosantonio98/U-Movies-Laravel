<!-- Name -->
<div class="form-group-custom">

    {!! Form::label('name', 'Nombre', [ 'class' => 'form-label-custom' ]) !!}

    {!! Form::text('name', null, [ 'class' => 'form-input-custom', 'placeholder' => 'Ingrese una nombre de película' ]) !!}

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

<!-- Year / Radio -->
<div class="grid grid-cols-1 md:grid-cols-2 md:gap-4">
    <!--  Year -->
    <div>
        <div class="form-group-custom">

            {!! Form::label('year', 'Año', [ 'class' => 'form-label-custom' ]) !!}

            {!! Form::text('year', null, [ 'class' => 'form-input-custom', 'placeholder' => 'Ingrese el año de la película' ]) !!}

            @error('year')
                <small class="form-error-custom">{{ $message }}</small>
            @enderror

        </div>
    </div>

    <!--  Radiobuttons -->
    <div>
        <div class="form-group-custom">
            <p class="text-gray-400">Estreno: </p>
        
            <div>
        
                <label class="mr-5 text-gray-500">
                    {!! Form::radio('premier', 1, true) !!}
                    <span class="ml-2">No</span>
                </label>
        
                <label class="mr-5 text-gray-500">
                    {!! Form::radio('premier', 2) !!}
                    <span class="ml-2">Si</span>
                </label>
        
            </div>
        
            @error('premier')
                <small class="form-error-custom">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>

<!-- Checkboxs -->
<div class="form-group-custom">

    <p class="text-gray-400">Categorías: </p>

    <div>

        @foreach ($categories as $category)

            <label class="mr-5 text-gray-500">

                {!! Form::checkbox('categories[]', $category->id, null) !!}
                <span class="ml-2">{{ $category->name }}</span>

            </label>

        @endforeach

    </div>

    @error('categories')
        <small class="form-error-custom">{{ $message }}</small>
    @enderror

</div>

<!-- Image cover / Image slider -->
<div class="grid grid-cols-1 md:grid-cols-2 md:gap-4">
    <!-- Image cover -->
    <div>
        <div class="form-group-custom">

            <label class="form-label-custom">Previsualización del cover</label>
        
            <div class="flex 
                        justify-center 
                        w-full 
                        h-48 
                        p-5 
                        mt-1 
                        mb-4 
                        rounded 
                        overflow-hidden 
                        border 
                        border-gray-400 
                        bg-[#24262d]">

                <img class="w-[100px] h-full object-cover" src="{{ isset($movie) ? Storage::url($movie->img_cover) : 'https://cdn.pixabay.com/photo/2022/08/03/08/11/little-boom-7362108_960_720.jpg' }}" id="pictureCover">
            </div>
        
        </div>

        <div class="form-group-custom">

            {!! Form::label('img_cover', 'Image cover', [ 'class' => 'form-label-custom' ]) !!}
        
            {!! Form::file('img_cover', [ 'class' => 'form-input-custom', 'accept' => 'image/*' ]) !!}
        
            @error('img_cover')
                <small class="form-error-custom">{{ $message }}</small>
            @enderror
        
        </div>
    </div>

    <!-- Image slider -->
    <div>
        <div class="form-group-custom">

            <label class="form-label-custom">Previsualización del slider</label>
        
            <div class="flex 
                        justify-center 
                        w-full 
                        h-48 
                        p-5 
                        mt-1 
                        mb-4 
                        rounded 
                        overflow-hidden 
                        border 
                        border-gray-400 
                        bg-[#24262d]">

                <img class="w-[250px] h-full object-cover" src="{{ isset($movie) ? Storage::url($movie->img_slide) : 'https://cdn.pixabay.com/photo/2022/08/03/08/11/little-boom-7362108_960_720.jpg' }}" id="pictureSlide">
            </div>
        
        </div>
        
        <div class="form-group-custom">
        
            {!! Form::label('img_slide', 'Image slider', [ 'class' => 'form-label-custom' ]) !!}
        
            {!! Form::file('img_slide', [ 'class' => 'form-input-custom', 'accept' => 'image/*' ]) !!}
        
            @error('img_slide')
                <small class="form-error-custom">{{ $message }}</small>
            @enderror
        
        </div>
    </div>
</div>

<!-- Markdown 1 -->
<div class="form-group-custom">

    {!! Form::label('extract', 'Extracto', [ 'class' => 'form-label-custom' ]) !!}

    {!! Form::textarea('extract') !!}

    @error('extract')
        <small class="form-error-custom">{{ $message }}</small>
    @enderror

</div>

<!-- Markdown 1 -->
<div class="form-group-custom">

    {!! Form::label('description', 'Descripción', [ 'class' => 'form-label-custom' ]) !!}

    {!! Form::textarea('description') !!}

    @error('description')
        <small class="form-error-custom">{{ $message }}</small>
    @enderror

</div>

<!-- Trailer -->
<div class="form-group-custom">

    {!! Form::label('trailer', 'Trailer', [ 'class' => 'form-label-custom' ]) !!}

    {!! Form::url('trailer', null, [ 'class' => 'form-input-custom', 'placeholder' => 'Ingrese el enlace del trailer de la película' ]) !!}

    @error('trailer')
        <small class="form-error-custom">{{ $message }}</small>
    @enderror

</div>

<!-- Active / Activation date -->
<div class="grid grid-cols-1 md:grid-cols-2 md:gap-4" @if (isset($movie) && $movie->active == 1) x-data="{ showDateField: true }" @else x-data="{ showDateField: false }" @endif>
    <!--  Radiobuttons -->
    <div>
        <div class="form-group-custom">
            <p class="text-gray-400">Activar ahora? </p>

            <div>

                <label class="mr-5 text-gray-500" x-on:click=" showDateField = true ">
                    {!! Form::radio('active', 1) !!}
                    <span class="ml-2">No</span>
                </label>

                <label class="mr-5 text-gray-500"  x-on:click=" showDateField = false ">
                    {!! Form::radio('active', 2, true) !!}
                    <span class="ml-2">Si</span>
                </label>

            </div>

            @error('active')
                <small class="form-error-custom">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <!--  Date -->
    <div x-cloak 
         x-show=" showDateField " 
         x-transition:enter="transition ease-in-out duration-150"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in-out duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">

        <div class="form-group-custom">

            {!! Form::label('activation_date', 'En qué fecha desea activarlo?', [ 'class' => 'form-label-custom' ]) !!}

            {!! Form::date('activation_date', null, [ 'class' => 'form-input-custom', 'placeholder' => 'Ingrese la fecha de activación' ]) !!}

            @error('activation_date')
                <small class="form-error-custom">{{ $message }}</small>
            @enderror

        </div>
    </div>
</div>
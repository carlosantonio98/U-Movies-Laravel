<div>
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name') !!}

    @error('name')
        <small><b>{{ $message }}</b></small>
    @enderror
</div>

<div>
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug') !!}

    @error('slug')
        <small><b>{{ $message }}</b></small>
    @enderror
</div>

<div>
    <p>Premier: </p>

    <label>
        {!! Form::radio('premier', 1, true) !!}
        No
    </label>
    
    <label>
        {!! Form::radio('premier', 2) !!}
        Si
    </label>

    @error('premier')
        <small><b>{{ $message }}</b></small>
    @enderror
</div>

<div>
    <p>Categories: </p>

    @foreach ($categories as $category)
        <label>
            {!! Form::checkbox('categories[]', $category->id, null) !!}
            {{ $category->name }}
        </label>
    @endforeach

    @error('categories')
        <small><b>{{ $message }}</b></small>
    @enderror
</div>

<div>

    <div>
        <img src="{{ empty($movie) ? 'https://cdn.pixabay.com/photo/2022/08/03/08/11/little-boom-7362108_960_720.jpg' : Storage::url($movie->img_cover) }}" width="100px" height="100px" id="pictureCover">
    </div>

    {!! Form::label('img_cover', 'Image cover') !!}
    <br>
    {!! Form::file('img_cover', ['accept' => 'image/*']) !!}


    @error('img_cover')
        <small><b>{{ $message }}</b></small>
    @enderror
</div>

<br>

<div>

    <div>
        <img src="{{ empty($movie) ? 'https://cdn.pixabay.com/photo/2022/08/03/08/11/little-boom-7362108_960_720.jpg' : Storage::url($movie->img_slide) }}" width="100px" height="100px" id="pictureSlide">
    </div>

    {!! Form::label('img_slide', 'Image slide') !!}
    <br>
    {!! Form::file('img_slide', ['accept' => 'image/*']) !!}

    @error('img_slide')
        <small><b>{{ $message }}</b></small>
    @enderror
</div>


<div>
    {!! Form::label('extract', 'Extract') !!}
    {!! Form::textarea('extract') !!}

    @error('extract')
        <small><b>{{ $message }}</b></small>
    @enderror
</div>

<div>
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description') !!}

    @error('description')
        <small><b>{{ $message }}</b></small>
    @enderror
</div>
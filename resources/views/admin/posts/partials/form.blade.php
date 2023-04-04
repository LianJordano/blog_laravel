<div class="form-group">
    {!! Form::label("name", "Nombre:") !!}
    {!! Form::text("name", null , ["class" => "form-control", "placeholder" => "Ingrese el nombre del post"]) !!}

    @error("name")
    <span class="text-danger">{{ $message }}</span>
    @enderror

</div>

<div class="form-group">
    {!! Form::label("slug", "Slug" ) !!}
    {!! Form::text("slug", null, ["class" => "form-control", "placeholder" => "Ingrese el slug del post", "readonly"] ) !!}

    @error("slug")
    <span class="text-danger">{{ $message }}</span>
    @enderror
    
</div>

<div class="form-group">
    {!! Form::label("categories", "Categoría" ) !!}
    {!! Form::select("category_id", $categories, null, ["class" => "form-control"]) !!}

    @error("category_id")
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>
    @foreach ($tags as $tag )
        <label class="mr-2">
            {!! Form::checkbox("tags[]", $tag->id, null,["class" =>""]) !!}
            {{$tag->name}}
        </label>
    @endforeach

    @error("tags")
    <br>
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Estado</p>

    <label class="mr-2">
        {!! Form::radio("status", 1, false) !!}
        Borrador
    </label>
    <label class="mr-2">
        {!! Form::radio("status", 2, false) !!}
        Publicado
    </label>

    @error("status")
    <br>
    <span class="text-danger">{{ $message }}</span>
    @enderror

</div>


<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($post->image)
             <img id="picture" src="{{ Storage::url($post->image->url) }}" alt="imagen del post {{$post->name }} ">
            @else
             <img id="picture" src="https://cdn.pixabay.com/photo/2015/09/29/21/02/handcuffs-964522_1280.jpg" alt="imagen por defecto">
            @endisset
        </div>
    </div>
    <div class="col">

        <div class="form-group">
            {!! Form::label("file", "Imagen del post") !!}
            {!! Form::file("file", ["class" => "form-control-file", "accept" =>"image/*" ]) !!}
        </div>

        @error("file")
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <ul>
            <li>Peso de la imagen</li>
            <li>Formato de imagen</li>
            <li>Info extra</li>
        </ul>
        
    </div>
</div>


<div class="form-group">
    {!! Form::label("extract","Extracto") !!}
    {!! Form::textarea("extract", null, ["class" => "form-control"]) !!}

    @error("extract")
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label("body","Cuerpo del post") !!}
    {!! Form::textarea("body", null, ["class" => "form-control"]) !!}

    @error("body")
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del post']) !!}

    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug del post', 'readonly']) !!}
    @error('slug')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    @error('category_id')
      <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>
     @foreach ($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null ) !!}
            {{$tag->name}}

        </label>
         
     @endforeach
    
     @error('tags')
     <br>
         <span class="text-danger">{{$message}}</span>
     @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    
        <label class="mr-2">
            {!! Form::radio('status', 1, true ) !!}
            Borrador

        </label>
         
        <label class="mr-2">
            {!! Form::radio('status', 2 ) !!}
            Publicado

        </label>
    
    @error('status')
    <br>
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($post->image)
                <img id="picture" src="{{Storage::url($post->image->url)}}" alt="">
            @else
                 <img id="picture" src="https://cdn.pixabay.com/photo/2022/11/10/20/44/switzerland-7583676_960_720.jpg" alt="">
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrará en el post') !!}
            {!! Form::file('file',['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        </div>
        @error('file')
        <br>
            <span class="text-danger">{{$message}}</span>
        @enderror
        
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia nesciunt aspernatur aperiam ut, voluptatem cumque at similique perferendis unde quisquam beatae, magnam velit aliquam. Tempore saepe nihil maiores ducimus commodi!</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extracto:') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
    @error('extract')
         <span class="text-danger">{{$message}}</span>
     @enderror
</div>
<div class="form-group">
    {!! Form::label('body', 'Cuerpo del post:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    @error('body')
    <span class="text-danger">{{$message}}</span>
@enderror
</div>
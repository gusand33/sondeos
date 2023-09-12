@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class=" card-header">
                <div class="row">
                    <div class="col-10 col-lg-10"><h4>Editando el Lobro <strong>{{ $book->title }}</strong></h4></div>
                </div>
            </div>
            <div class="card">
                {!! Form::model($book, ['method' => 'PATCH','route' => ['books.update', $book->id], "role"=>"form text-left", "class"=>"from"]) !!}
                <div class="row m-3">
                    <div class="col-12 col-lg-6">
                        {{ Form::label("title", "Titulo",['class' => 'form-label']) }}
                        <span class="ms-2 text-danger border-0">*</span>
                        {!! Form::text('title', null, array('class' => 'form-control',"required"=>"required")) !!}
                        <label id="title-error" class="error text-danger" for="title"></label>
                    </div>
                    <div class="col-12 col-lg-6">
                        {{ Form::label("author", "Autor",['class' => 'form-label']) }}
                        <span class="ms-2 text-danger border-0">*</span>
                        {!! Form::text('author', null, array('class' => 'form-control',"required"=>"required")) !!}
                        <label id="author-error" class="error text-danger" for="author"></label>
                    </div>
                    <div class="col-12 col-lg-4">
                        {{ Form::label("price", "Precio",['class' => 'form-label']) }}
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            {!! Form::number('price', null, array('class' => 'form-control')) !!}
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        {{ Form::label("publication_date", "Fecha de Publicacion",['class' => 'form-label']) }}
                        <span class="ms-2 text-danger border-0">*</span>
                        {!! Form::date('publication_date', null, array('class' => 'form-control',"required"=>"required")) !!}
                        <label id="publication_date-error" class="error text-danger" for="publication_date"></label>
                    </div>
                    <div class="col-12 col-lg-4">
                        {{ Form::label("gender_id", "Genero",['class' => 'form-label']) }}
                        <span class="ms-2 text-danger border-0">*</span>
                        {!! Form::select('gender_id',$genders, null, array('placeholder'=>'Seleccione', 'class' => 'form-control',"required"=>"required")) !!}
                        <label id="gender_id-error" class="error text-danger" for="gender_id"></label>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
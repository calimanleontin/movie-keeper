@extends('app')
@section('title')
    New Movie
@endsection
@section('content')
    {!! Form::open(array('url' => '/auth/storeMovie', 'method'=>'POST', 'files'=>true, 'class' => '')) !!}
    {!! Form::token() !!}

    <div class="form-group  col-md-5">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', '',  ['class' => 'form-control', 'placeholder'=>'Title']) !!}
    </div>
    <div class="form-group  col-md-5">
        {!! Form::label('year', 'Year:') !!}
        {!! Form::text('year', '', ['class' => 'form-control', 'placeholder' => 'Year']) !!}
     </div>
    <div class="form-group  col-md-5">
        {!! Form::label('released', 'Released:') !!}
        {!! Form::text('released', '', ['class' => 'form-control', 'placeholder' => 'Released']) !!}
    </div>
    <div class="form-group col-md-5">
        {!! Form::label('runtime', 'Runtime:') !!}
        {!! Form::text('runtime', '', ['class' => 'form-control', 'placeholder' => 'Runtime']) !!}
    </div>
    <div class="form-group col-md-5">
        {!! Form::label('genre', 'Genre:') !!}
        {!! Form::text('genre', '', ['class' => 'form-control', 'placeholder' => 'Genre']) !!}
    </div>
    <div class="form-group col-md-5">
        {!! Form::label('director', 'Director:') !!}
        {!! Form::text('director', '', ['class' => 'form-control', 'placeholder' => 'Director']) !!}
    </div>
    <div class="form-group col-md-5">
        {!! Form::label('writer', 'Writer:') !!}
        {!! Form::text('writer', '', ['class' => 'form-control', 'placeholder' => 'Writer']) !!}
    </div>
    <div class="form-group col-md-5">
        {!! Form::label('language', 'Language:') !!}
        {!! Form::text('language', '', ['class' => 'form-control', 'placeholder' => 'Language']) !!}
    </div>
    <div class="form-group col-md-5">
        {!! Form::label('awards', 'Awards:') !!}
        {!! Form::text('awards', '', ['class' => 'form-control', 'placeholder' => 'Awards']) !!}
    </div>
    <div class="form-group col-md-5">
        {!! Form::label('type', 'Type:') !!}
        {!! Form::text('type', '', ['class' => 'form-control', 'placeholder' => 'Type']) !!}
    </div>
    <div class="form-group">
        {!! Form::file('poster', '', ['class' => 'form-control', 'placeholder' => 'Poster', 'required' => true]) !!}
    </div>

    <div class="form-group col-md-3">
        {!! Form::submit('Submit', ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}
@endsection
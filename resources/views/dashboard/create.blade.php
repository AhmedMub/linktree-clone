@extends('layouts.master')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="header-title">Basic form</h4>
            {!! Form::open(['route'=>['links.store']]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Link Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
                    <small class="form-text text-muted">This name will be displayed in your profile</small>
                </div>
                <div class="form-group">
                    {!! Form::label('link','Link URL') !!}
                    {!! Form::text('link', null,['class'=>'form-control','placeholder'=>'Enter URL, Example: https://www.youtube.com/xxxxxxx']) !!}
                </div>
                {!! Form::submit('Save Link', ['class'=>'btn btn-primary btn-flat']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

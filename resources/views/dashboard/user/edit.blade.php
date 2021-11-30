@extends('layouts.master')

@section('content')

<div class="settings">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Profile Setrings</h4>
            {!! Form::open(['route'=>['user.update', $user->id]]) !!}
            <div class="form-group">
                {!! Form::label('username', 'Username') !!}
                {!! Form::text('username', $user->username, ['class'=>'form-control',
                'placeholder'=>'Enter email']) !!}
                <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small>
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', $user->email,['class'=>'form-control',
                'aria-describedby'=>'emailHelp', 'placeholder'=>'Enter email'] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Set Background Color') !!}
                {!! Form::text('text', $user->email,['class'=>'form-control',
                'aria-describedby'=>'emailHelp', 'placeholder'=>'Enter email'] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Set Text color') !!}
                {!! Form::text('email', $user->email,['class'=>'form-control',
                'aria-describedby'=>'emailHelp', 'placeholder'=>'Enter email'] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Profile Image') !!}
                {!! Form::text('email', $user->email,['class'=>'form-control',
                'aria-describedby'=>'emailHelp', 'placeholder'=>'Enter email'] ) !!}
            </div>
            {!! Form::submit('Update', ['class'=>'btn btn-primary mt-4 pr-4 pl-4']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

<div class="modal fade" id="editSettings" tabindex="-1" aria-labelledby="prSettings" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="prSettings">Edit Profile Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {!! Form::open(['route'=>['user.update'], 'class'=>'update-profile-set', 'files' => true]) !!}
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('username', 'Username') !!}
                    {!! Form::text('username', null, ['class'=>'form-control username-set username_err',
                    'placeholder'=>'Enter email']) !!}
                    <span class="invalid-feedback" role="alert">
                        <strong class="username_seterror"></strong>
                    </span>
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', null,['class'=>'form-control email-set email_err',
                    'aria-describedby'=>'emailHelp', 'placeholder'=>'Enter email'] ) !!}
                    <span class="invalid-feedback" role="alert">
                        <strong class="email_seterror"></strong>
                    </span>
                </div>
                <div class="form-group">
                    {!! Form::label('background_color', 'Set Background Color') !!}
                    {!! Form::text('background_color', null,['class'=>'form-control background_color-set
                    background_color_err',
                    'placeholder'=>'Background Link Color']
                    ) !!}
                    <span class="invalid-feedback" role="alert">
                        <strong class="background_color_seterror"></strong>
                    </span>
                </div>
                <div class="form-group">
                    {!! Form::label('text_color', 'Set Text color') !!}
                    {!! Form::text('text_color', null,['class'=>'form-control text_color-set text_color_err',
                    'placeholder'=>'Enter Link Text Color']
                    ) !!}
                    <span class="invalid-feedback" role="alert">
                        <strong class="text_color_seterror"></strong>
                    </span>
                </div>

                <div class="form-group">
                    <div class="input-group mt-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            {!! Form::file('image',['class'=>'custom-file-input', 'id'=>'inputGroupFile01'] ) !!}
                            {!! Form::label('image', 'Profile Image',
                            ['class'=>'custom-file-label image_err','id'=>'inputGroupFile01'])
                            !!}
                            <span class="invalid-feedback" role="alert">
                                <strong class="image_seterror "></strong>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password',['class'=>'form-control password_err',
                    'placeholder'=>'New Password', 'id'=>'editeUserPass']) !!}
                    <span class="invalid-feedback" role="alert">
                        <strong class="password_seterror"></strong>
                    </span>
                    <small class="form-text text-muted">
                        If password field empty old password will not change.
                    </small>
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirm Password') !!}
                    {!! Form::password('password_confirmation',['class'=>'form-control',
                    'placeholder'=>'Confirm Password', 'id'=>'editeUserPassConfirm']) !!}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-flat btn-close" data-dismiss="modal">Close</button>
                {!! Form::submit('Update Settings', ['class'=>'btn btn-primary btn-flat']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

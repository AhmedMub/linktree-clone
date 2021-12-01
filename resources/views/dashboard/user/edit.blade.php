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
                    {!! Form::text('username', null, ['class'=>'form-control username-set',
                    'placeholder'=>'Enter email']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', null,['class'=>'form-control email-set',
                    'aria-describedby'=>'emailHelp', 'placeholder'=>'Enter email'] ) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('background_color', 'Set Background Color') !!}
                    {!! Form::text('background_color', null,['class'=>'form-control background_color-set',
                    'placeholder'=>'Background Link Color']
                    ) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('text_color', 'Set Text color') !!}
                    {!! Form::text('text_color', null,['class'=>'form-control text_color-set',
                    'placeholder'=>'Enter Link Text Color']
                    ) !!}
                </div>

                <div class="form-group">
                    <div class="input-group mt-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            {!! Form::file('image',['class'=>'custom-file-input', 'id'=>'inputGroupFile01'] ) !!}
                            {!! Form::label('image', 'Profile Image',
                            ['class'=>'custom-file-label','id'=>'inputGroupFile01'])
                            !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password',['class'=>'form-control',
                    'placeholder'=>'New Password', 'id'=>'editeUserPass']) !!}
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

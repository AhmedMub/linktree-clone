<div class="modal fade" id="editLink" tabindex="-1" aria-labelledby="editLinkDB" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLinkDB">Edit Your Link</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {!! Form::open(['class'=>'update-link-form', 'method'=>'PUT']) !!}
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('name', 'Link Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control inv-name-msg form-edit-name',
                    'placeholder'=>'Enter Name', 'id'=>'editeLinkN']) !!}
                    <span class="invalid-feedback" role="alert">
                        <strong class="name_error"></strong>
                    </span>
                    <small class="form-text text-muted">This name will be displayed in your profile</small>
                </div>
                <div class="form-group">
                    {!! Form::label('link','Link URL') !!}
                    {!! Form::text('link', null,['class'=>'form-control inv-link-msg
                    form-edit-link','id'=>'rr','placeholder'=>'Enter URL, Example:
                    https://www.youtube.com/yourchannel'])
                    !!}
                    <span class="invalid-feedback" role="alert">
                        <strong class="link_error"></strong>
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-flat btn-close" data-dismiss="modal">Close</button>
                {!! Form::submit('Update Link', ['class'=>'btn btn-primary btn-flat']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

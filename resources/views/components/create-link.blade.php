<div class="modal fade" id="createLink" tabindex="-1" aria-labelledby="createNewLink" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="createNewLink">Add New Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        {!! Form::open(['route'=>['links.store'], 'class'=>'create-new-link']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('name', 'Link Name') !!}
                        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
                        <span class="invalid-feedback" role="alert">
                            <strong class="name_error"></strong>
                        </span>
                        <small class="form-text text-muted">This name will be displayed in your profile</small>
                    </div>
                    <div class="form-group">
                        {!! Form::label('link','Link URL') !!}
                        {!! Form::text('link', null,['class'=>'form-control','placeholder'=>'Enter URL, Example: https://www.youtube.com/yourchannel']) !!}
                        <span class="invalid-feedback" role="alert">
                            <strong class="link_error"></strong>
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-flat btn-close" data-dismiss="modal">Close</button>
                    {!! Form::submit('Save Link', ['class'=>'btn btn-primary btn-flat']) !!}
                </div>
            {!! Form::close() !!}
    </div>
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        {{ Form::label('subject', 'Subject :', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Subject', 'required' => 'required']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('body', 'Body :', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('body', null, ['class' => 'form-control', 'cols' => 40, 'rows' => 4]) }}
        </div>
    </div>
</div>

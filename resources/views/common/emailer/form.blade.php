<div class="box-body">
    <div class="form-group">
        {{ Form::label('subject', 'Subject :', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('subject', null, ['class' => 'form-control', 'id' => 'subject', 'placeholder' => 'Subject', 'data-alnum-type' => 'alphanum', 'data-alnum-length' => 155, 'maxlength' => '155', 'data-alnum-allow' => "'-",'required' => 'required']) }}
            <span id="char-counter" class="text-info"></span>
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('body', 'Body :', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('body', null, ['class' => 'form-control', 'id' =>'body',   'cols' => 40, 'rows' => 4]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('send-sms', 'Send Sms :', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            <input type="checkbox" name="send-sms" id="switch-change" value="0" data-toggle="toggle">
        </div>
    </div>

    <div class="form-group" id="smsContainer" style="display: none;">
        {{ Form::label('sms', 'Sms :', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">

            {{ Form::text('sms', null, ['class' => 'form-control', 'id' => 'sms', 'placeholder' => 'SMS', 'data-alnum-type' => 'alphanum', 'data-alnum-length' => 150, 'maxlength' => '150', 'data-alnum-allow' => "'-"]) }}
            <span id="sms-char-counter" class="text-info"></span>
        </div>
    </div>
</div>

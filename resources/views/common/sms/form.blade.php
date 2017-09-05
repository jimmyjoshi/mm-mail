<div class="box-body">
    <div class="form-group">
        {{ Form::label('sms', 'Sms :', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">

            {{ Form::text('sms', null, ['class' => 'form-control', 'id' => 'sms', 'placeholder' => 'SMS', 'data-alnum-type' => 'alphanum', 'data-alnum-length' => 150, 'maxlength' => '150', 'data-alnum-allow' => "'-", 'required']) }}
            <span id="sms-char-counter" class="text-info"></span>
        </div>
    </div>
</div>

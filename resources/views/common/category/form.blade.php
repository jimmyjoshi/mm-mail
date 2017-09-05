<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', 'Category Name :', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Category Name', 'required' => 'required']) }}
        </div>
    </div>
</div>
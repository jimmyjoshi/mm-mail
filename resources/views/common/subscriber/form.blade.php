<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', 'Subscriber Name :', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Subscriber Name', 'required' => 'required']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('name', 'Company Name :', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('company_name', null, ['class' => 'form-control', 'placeholder' => 'Company Name', 'required' => 'required']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('name', 'Mobile :', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'Mobile Number', 'required' => 'required']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('name', 'Other Contact Number :', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('other_contact', null, ['class' => 'form-control', 'placeholder' => 'Other Contact Number', 'required' => 'required']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('email_id', 'Email Id :', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('email_id', null, ['class' => 'form-control', 'placeholder' => 'Email Id', 'required' => 'required']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('notes', 'Notes :', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('notes', null, ['class' => 'form-control', 'cols' => 40, 'rows' => 4]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('name', 'Subscriber Category:', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
        	{!! Form::select('category_id',  [0 => 'Select Category'] + $repository->getSubscriberCategories() , null, array('class' => 'form-control filter-type-select2', 'id' => 'category_id', 'required' => 'required')) !!}
        </div>
    </div> 
</div>

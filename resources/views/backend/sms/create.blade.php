@extends ('backend.layouts.app')

@section ('title', isset($repository->moduleTitle) ? 'Create - '. $repository->moduleTitle : 'Create')

{{ Html::style('css//default/style.min.css') }}
<style>
i.jstree-icon.jstree-themeicon {
    display: none;
}
</style>

@section('page-header')
    <h1>
        {{ isset($repository->moduleTitle) ? $repository->moduleTitle : '' }}
        <small>Create</small>
    </h1>
@endsection

@section('content')
    {{ Form::open([
        'id'        => 'sms-template-form',
        'route'     => $repository->getActionRoute('storeRoute'),
        'class'     => 'form-horizontal',
        'role'      => 'form',
        'method'    => 'post'
    ])}}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Create {{ isset($repository->moduleTitle) ? $repository->moduleTitle : '' }}</h3>

                <div class="box-tools pull-right">
                    @include('common.sms.header-buttons', [
                        'listRoute'     => $repository->getActionRoute('listRoute'),
                        'createRoute'   => $repository->getActionRoute('createRoute')
                    ])
                </div>
            </div>

            <div class="col-md-12">
                @php
                    $sr = 0;
                    $javaScript = '';
                @endphp
                @foreach($categories as $category)

                    @if(count($category->subscribers) < 1)
                        @continue;
                    @endif

                    <div class="col-md-3">
                        <strong>{{ $category->name }}</strong>
                        @php
                            foreach($category->subscribers as $subscriber)
                            {
                                $jsTree[$sr]['children'][] = [
                                    'id'    => $subscriber->id,
                                    'text'  => $subscriber->name,
                                        "state" => [
                                            "selected" => true
                                        ]
                                ];
                            }

                            $javaScript .= 'jQuery("#ajax-'.$sr.'").jstree(
                                    {
                                        "checkbox" :
                                        {
                                            "keep_selected_style" : false
                                        },
                                        "plugins" : [ "checkbox" ],
                                        "core" :
                                        {
                                            "data" : ' . json_encode($jsTree[$sr]) .'
                                        }
                                    });';
                        @endphp
                        <div id="ajax-{{$sr}}" class="demo">
                            {{ json_encode($jsTree[$sr]) }}
                        </div>
                    </div>
                    @php $sr++; @endphp
                @endforeach
            </div>

            {{-- SmS Form --}}
            @include('common.sms.form')

        </div>

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route($repository->getActionRoute('listRoute'), 'Cancel', [], ['class' => 'btn btn-danger btn-xs']) }}
                </div>

                <div class="pull-right">
                    {{ Form::submit('Create', ['class' => 'btn btn-success btn-xs']) }}
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        {{ Form::hidden('subscribers', null, ['id' => 'subscribers'])}}
    {{ Form::close() }}
@endsection

@section('after-scripts')
{{ Html::script('js/jstree/jstree.min.js') }}
{{ Html::script('js/backend/access/roles/script.js') }}
<script>

   {!! $javaScript !!}

jQuery(document).ready(function()
{
    setInterval(function()
    {
        BaseCommon.Utils.characterCount('sms', 'sms-char-counter')
    }, 55);

    //Get list of the checked items and send them to the serer
    document.getElementById("sms-template-form").onsubmit = function()
    {
        var subscribers = [];

        jQuery("#subscribers").val('');

        for(var i = 0; i <= {!! $sr !!}; i++)
        {
            if(typeof jQuery('#ajax-'+i).html() != 'undefined')
            {
                subscribers = subscribers.concat(jQuery('#ajax-'+i).jstree("get_checked", false));
            }
        }

        jQuery("#subscribers").val(subscribers);
        return true;
    }
});
</script>
@stop
@extends('layouts.app')
@section('title', __('product.add_new_product'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black">@lang('product.add_new_product')</h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">

      <!-- Sub Menu -->
      <div class="horizontal-scroll mb-10">
        @include('layouts.sub_menu.product')
    </div>
    <!---submenu end--->
    
    @php
        $form_class = empty($duplicate_product) ? 'create' : '';
        $is_image_required = !empty($common_settings['is_product_image_required']);
    @endphp

    {!! Form::open(['url' => action([\App\Http\Controllers\ProductController::class, 'store']), 'method' => 'post', 'id' => 'product_add_form','class' => 'product_form ' . $form_class, 'files' => true ]) !!}
        
        <!-- Main Product Information -->
        @component('components.widget', ['class' => 'box-primary'])
            
            <div class="row">
                <!-- LEFT COLUMN -->
                <div class="col-md-8 tw-border-r tw-border-gray-200">
                    
                    <!-- SECTION 1: Basic Information -->
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="tw-text-sm tw-font-semibold tw-text-gray-700 tw-mb-2 tw-pb-1 tw-border-b tw-border-blue-400">
                                <i class="fa fa-info-circle tw-mr-1 tw-text-blue-500"></i>@lang('lang_v1.basic_information')
                            </h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('name', __('product.product_name') . ':*') !!}
                                {!! Form::text('name', !empty($duplicate_product->name) ? $duplicate_product->name : null, ['class' => 'form-control', 'required',
                                'placeholder' => __('product.product_name')]); !!}
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('sku', __('product.sku') . ':') !!} @show_tooltip(__('tooltip.sku'))
                                {!! Form::text('sku', null, ['class' => 'form-control',
                                'placeholder' => __('product.sku')]); !!}
                            </div>
                        </div>

                        <div class="col-sm-6 @if(empty($common_settings['enable_product_defult_discount'])) hide @endif">
                            <div class="form-group">
                                {!! Form::label('discount', __('lang_v1.discount') . ':*') !!}
                                {!! Form::select('discount_id', $discounts, !empty($duplicate_product->discount_id) ? $duplicate_product->discount_id : '', ['class' => 'form-control select2']); !!}
                            </div>
                        </div>
                    </div>

            <!-- SECTION 2: Product Classification -->
            <div class="row tw-mt-3">
                <div class="col-md-12">
                    <h5 class="tw-text-sm tw-font-semibold tw-text-gray-700 tw-mb-2 tw-pb-1 tw-border-b tw-border-purple-400">
                        <i class="fa fa-tags tw-mr-1 tw-text-purple-500"></i>@lang('lang_v1.product_classification')
                    </h5>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 @if(!session('business.enable_brand')) hide @endif">
                    <div class="form-group">
                        {!! Form::label('brand_id', __('product.brand') . ':') !!}
                        <div class="input-group">
                            {!! Form::select('brand_id', $brands, !empty($duplicate_product->brand_id) ? $duplicate_product->brand_id : null, ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2']); !!}
                            <span class="input-group-btn">
                                <button type="button" @if(!auth()->user()->can('brand.create')) disabled @endif class="btn btn-default bg-white btn-flat btn-modal" data-href="{{action([\App\Http\Controllers\BrandController::class, 'create'], ['quick_add' => true])}}" title="@lang('brand.add_brand')" data-container=".view_modal"><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 @if(!session('business.enable_category')) hide @endif">
                    <div class="form-group">
                        {!! Form::label('category_id', __('product.category') . ':') !!}
                        <div class="input-group">
                            {!! Form::select('category_id', $categories, !empty($duplicate_product->category_id) ? $duplicate_product->category_id : null, ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2']); !!}
                            <span class="input-group-btn">
                                <button type="button" @if(!auth()->user()->can('category.create')) disabled @endif class="btn btn-default bg-white btn-flat btn-modal" data-href="{{action([\App\Http\Controllers\TaxonomyController::class, 'create'], ['type' => 'product'])}}" title="@lang('category.add_category')" data-container=".view_modal"><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 @if(!(session('business.enable_category') && session('business.enable_sub_category'))) hide @endif">
                    <div class="form-group">
                        {!! Form::label('sub_category_id', __('product.sub_category') . ':') !!}
                        <div class="input-group">
                            {!! Form::select('sub_category_id', $sub_categories, !empty($duplicate_product->sub_category_id) ? $duplicate_product->sub_category_id : null, ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2']); !!}
                            <span class="input-group-btn">
                                <button type="button" @if(!auth()->user()->can('category.create')) disabled @endif class="btn btn-default bg-white btn-flat btn-modal" data-href="{{action([\App\Http\Controllers\TaxonomyController::class, 'create'], ['type' => 'product'])}}" title="@lang('category.add_sub_category')" data-container=".view_modal"><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-6 @if(empty($common_settings['enable_product_premade'])) hide  @endif">
                    <div class="form-group">
                        <label class="tw-mt-2">
                            {!! Form::checkbox('pre_made', 1, !empty($duplicate_product) ? $duplicate_product->pre_made : false, ['class' => 'input-icheck', 'id' => 'pre_made']); !!} 
                            <strong>@lang('product.pre_made')</strong>
                        </label>
                    </div>
                </div>
            </div>

            <!-- SECTION 3: Unit & Serial Settings -->
            <div class="row tw-mt-3">
                <div class="col-md-12">
                    <h5 class="tw-text-sm tw-font-semibold tw-text-gray-700 tw-mb-2 tw-pb-1 tw-border-b tw-border-green-400">
                        <i class="fa fa-cubes tw-mr-1 tw-text-green-500"></i>@lang('lang_v1.unit_serial_settings')
                    </h5>
                </div>
            </div>

            <div class="row">             
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('unit_id', __('product.unit') . ':*') !!}
                        <div class="input-group">
                            {!! Form::select('unit_id', $units, !empty($duplicate_product->unit_id) ? $duplicate_product->unit_id : session('business.default_unit'), ['class' => 'form-control select2', 'required']); !!}
                            <span class="input-group-btn">
                                <button type="button" @if(!auth()->user()->can('unit.create')) disabled @endif class="btn btn-default bg-white btn-flat btn-modal" data-href="{{action([\App\Http\Controllers\UnitController::class, 'create'], ['quick_add' => true])}}" title="@lang('unit.add_unit')" data-container=".view_modal"><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
                            </span>
                        </div>
                    </div>
                </div>

                @if(!empty($common_settings['enable_product_multi_unit']))
                    <div class="multi_unit_box">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="tw-mt-2">
                                    {!! Form::checkbox('use_multi_unit', 1, !empty($duplicate_product) ? $duplicate_product->use_multi_unit : false, ['class' => 'input-icheck', 'id' => 'use_multi_unit']); !!} <strong>@lang('product.use_multi_unit')</strong>
                                </label>
                                @show_tooltip(__('tooltip.use_multi_unit')) 
                                <p class="help-block tw-text-xs tw-mb-0">
                                    <i>@lang('product.use_multi_unit_help')</i>
                                </p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
    
                        <div class="col-md-6 multi_unit hide">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('first_conversion_unit_id', __('product.first_conversion_unit') . ':*') !!}
                                        <div class="input-group">
                                            {!! Form::select('first_conversion_unit_id', [], null, ['disabled'=> true, 'style' => 'width:100%;', 'class' => 'form-control select2', 'id'=>'first_conversion_unit_id']); !!}
                                            <span class="input-group-btn">
                                                <button type="button" @if(!auth()->user()->can('unit.create')) disabled @endif class="btn btn-default bg-white btn-flat btn-modal" data-href="{{action([\App\Http\Controllers\UnitController::class, 'create'], ['quick_add' => true,'first_unit'=>true])}}" title="@lang('unit.add_unit')" data-container=".view_modal">
                                                    <i class="fa fa-plus-circle text-primary fa-lg"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('first_conversion_unit_rate', __('product.first_conversion_unit_rate') . ':*') !!}
                                        {!! Form::text('first_conversion_unit_rate', null, ['disabled'=> true,'class' => 'form-control', 'id'=>'first_conversion_unit_rate', 'placeholder' => __('Conversion rate')]); !!}
                                    </div>
                                </div>
    
                            </div>
                        </div>
                        <div class="col-md-6 multi_unit hide">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('second_conversion_unit_id', __('product.second_conversion_unit') . ':') !!}
                                        <div class="input-group">
                                            {!! Form::select('second_conversion_unit_id', [], null, ['disabled'=> true, 'style' => 'width:100%;', 'class' => 'form-control select2', 'id'=>'second_conversion_unit_id']); !!}
                                            <span class="input-group-btn">
                                                <button type="button" @if(!auth()->user()->can('unit.create')) disabled @endif class="btn btn-default bg-white btn-flat btn-modal second_unit_create_btn" data-href="{{action([\App\Http\Controllers\UnitController::class, 'create'], ['quick_add' => true,'second_unit'=>true])}}" title="@lang('unit.add_unit')" data-container=".view_modal"><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('second_conversion_unit_rate', __('product.second_conversion_unit_rate') . ':*') !!}
                                        {!! Form::text('second_conversion_unit_rate', null, ['disabled'=> true,'class' => 'form-control', 'id'=>'second_conversion_unit_rate', 'placeholder' => __('Conversion rate')]); !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endif
                
                <div class="col-sm-6 @if(!session('business.enable_sub_units')) hide @endif">
                    <div class="form-group">
                        {!! Form::label('sub_unit_ids', __('lang_v1.related_sub_units') . ':') !!} @show_tooltip(__('lang_v1.sub_units_tooltip'))
                        {!! Form::select('sub_unit_ids[]', [], !empty($duplicate_product->sub_unit_ids) ? $duplicate_product->sub_unit_ids : null, ['class' => 'form-control select2', 'multiple', 'id' => 'sub_unit_ids']); !!}
                    </div>
                </div>
                
                @if(!empty($common_settings['enable_secondary_unit']))
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('secondary_unit_id', __('lang_v1.secondary_unit') . ':') !!} @show_tooltip(__('lang_v1.secondary_unit_help'))
                            {!! Form::select('secondary_unit_id', $units, !empty($duplicate_product->secondary_unit_id) ? $duplicate_product->secondary_unit_id : null, ['class' => 'form-control select2']); !!}
                        </div>
                    </div>
                @endif
            </div>

            <!-- SECTION 4: Stock Management -->
            <div class="row tw-mt-3">
                <div class="col-md-12">
                    <h5 class="tw-text-sm tw-font-semibold tw-text-gray-700 tw-mb-2 tw-pb-1 tw-border-b tw-border-orange-400">
                        <i class="fa fa-warehouse tw-mr-1 tw-text-orange-500"></i>@lang('lang_v1.stock_management')
                    </h5>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="tw-mt-2">
                            {!! Form::checkbox('enable_stock', 1, !empty($duplicate_product) ? $duplicate_product->enable_stock : true, ['class' => 'input-icheck', 'id' => 'enable_stock']); !!} <strong>@lang('product.manage_stock')</strong>
                        </label>@show_tooltip(__('tooltip.enable_stock')) 
                        <p class="help-block tw-text-xs tw-mb-0"><i>@lang('product.enable_stock_help')</i></p>
                    </div>
                </div>

                <div class="col-sm-4 @if(!empty($duplicate_product) && $duplicate_product->enable_stock == 0) hide @endif" id="alert_quantity_div">
                    <div class="form-group">
                        {!! Form::label('alert_quantity', __('product.alert_quantity') . ':') !!} @show_tooltip(__('tooltip.alert_quantity'))
                        {!! Form::text('alert_quantity', !empty($duplicate_product->alert_quantity) ? @format_quantity($duplicate_product->alert_quantity) : null , ['class' => 'form-control input-number',
                        'placeholder' => __('product.alert_quantity'), 'min' => '0']); !!}
                    </div>
                </div>

                <!-- include module fields -->
                @if(!empty($pos_module_data))
                @foreach($pos_module_data as $key => $value)
                @if(!empty($value['view_path']))
                @includeIf($value['view_path'], ['view_data' => $value['view_data']])
                @endif
                @endforeach
                @endif
            </div>

                </div>
                <!-- END LEFT COLUMN -->

                <!-- RIGHT COLUMN -->
                <div class="col-md-4">
                    
                    <!-- Barcode Type & Business Locations -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('barcode_type', __('product.barcode_type') . ':*') !!}
                                {!! Form::select('barcode_type', $barcode_types, !empty($duplicate_product->barcode_type) ? $duplicate_product->barcode_type : $barcode_default, ['class' => 'form-control select2', 'required']); !!}
                            </div>
                        </div>

                        @php
                        $default_location = null;
                        if(count($business_locations) == 1){
                        $default_location = array_key_first($business_locations->toArray());
                        }
                        @endphp
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('product_locations', __('business.business_locations') . ':') !!} @show_tooltip(__('lang_v1.product_location_help'))
                                {!! Form::select('product_locations[]', $business_locations, $default_location, ['class' => 'form-control select2', 'multiple', 'id' => 'product_locations']); !!}
                            </div>
                        </div>
                    </div>

                    <!-- Warranty & Serial Settings Section -->
                    <div class="row tw-mt-3">
                        <div class="col-md-12">
                            <h5 class="tw-text-sm tw-font-semibold tw-text-gray-700 tw-mb-2 tw-pb-1 tw-border-b tw-border-teal-400">
                                <i class="fa fa-shield tw-mr-1 tw-text-teal-500"></i>@lang('lang_v1.warranty_serial_settings')
                            </h5>
                        </div>
                    </div>

                    <div class="row">
                        @if(!empty($common_settings['enable_product_warranty']))
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('warranty_id', __('lang_v1.warranty') . ':') !!}
                                {!! Form::select('warranty_id', $warranties, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); !!}
                            </div>
                        </div>
                        @endif

                        <div class="col-md-12 enable_serial_number_div">
                            <div class="form-group">
                                <label class="tw-mt-2">
                                    {!! Form::checkbox('enable_serial_number', 1, !(empty($duplicate_product)) ? $duplicate_product->enable_serial_number : false, ['class' => 'input-icheck','id'=>'enable_serial_number']); !!} <strong>@lang('lang_v1.enable_serial_number')</strong>
                                </label> @show_tooltip(__('lang_v1.tooltip_enable_serial_number'))
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="tw-mt-2">
                                    {!! Form::checkbox('enable_sr_no', 1, !(empty($duplicate_product)) ? $duplicate_product->enable_sr_no : false, ['class' => 'input-icheck']); !!} <strong>@lang('lang_v1.enable_imei_or_sr_no')</strong>
                                </label> @show_tooltip(__('lang_v1.tooltip_sr_no'))
                            </div>
                        </div>
                    </div>

                    <!-- Product Attributes in Right Column -->
                    <div class="row tw-mt-3">
                        <div class="col-md-12">
                            <h5 class="tw-text-sm tw-font-semibold tw-text-gray-700 tw-mb-2 tw-pb-1 tw-border-b tw-border-indigo-400">
                                <i class="fa fa-th-list tw-mr-1 tw-text-indigo-500"></i>@lang('lang_v1.product_attributes')
                            </h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="tw-mt-2">
                                    {!! Form::checkbox('not_for_selling', 1, !(empty($duplicate_product)) ? $duplicate_product->not_for_selling : false, ['class' => 'input-icheck']); !!} <strong>@lang('lang_v1.not_for_selling')</strong>
                                </label> @show_tooltip(__('lang_v1.tooltip_not_for_selling'))
                            </div>
                        </div>

                        @php
                        $custom_labels = json_decode(session('business.custom_labels'), true);
                        $product_custom_fields = !empty($custom_labels['product']) ? $custom_labels['product'] : [];
                        $product_cf_details = !empty($custom_labels['product_cf_details']) ? $custom_labels['product_cf_details'] : [];
                        @endphp

                        @foreach($product_custom_fields as $index => $cf)
                            @if(!empty($cf))
                                @php
                                    $db_field_name = 'product_custom_field' . $loop->iteration;
                                    $cf_type = !empty($product_cf_details[$loop->iteration]['type']) ? $product_cf_details[$loop->iteration]['type'] : 'text';
                                    $dropdown = !empty($product_cf_details[$loop->iteration]['dropdown_options']) ? explode(PHP_EOL, $product_cf_details[$loop->iteration]['dropdown_options']) : [];
                                @endphp

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label($db_field_name, $cf . ':') !!}

                                        @if(in_array($cf_type, ['text', 'date']))
                                            <input type="{{$cf_type}}" name="{{$db_field_name}}" id="{{$db_field_name}}" value="{{!empty($duplicate_product->$db_field_name) ? $duplicate_product->$db_field_name : null}}" class="form-control" placeholder="{{$cf}}">
                                        @elseif($cf_type == 'dropdown')
                                            {!! Form::select($db_field_name, $dropdown, !empty($duplicate_product->$db_field_name) ? $duplicate_product->$db_field_name : null, ['placeholder' => $cf, 'class' => 'form-control select2']); !!}
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
                <!-- END RIGHT COLUMN -->
            </div>
            <!-- END TWO COLUMN ROW -->
        @endcomponent

        <!-- SECTION: Tax & Pricing Configuration (Full Width) -->
        @component('components.widget', ['class' => 'box-primary'])
            <div class="row">
                <div class="col-md-12">
                    <h5 class="tw-text-sm tw-font-semibold tw-text-gray-700 tw-mb-2 tw-pb-1 tw-border-b tw-border-red-400">
                        <i class="fa fa-dollar-sign tw-mr-1 tw-text-red-500"></i>@lang('lang_v1.tax_pricing_configuration')
                    </h5>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 @if(!session('business.enable_price_tax')) hide @endif">
                    <div class="form-group">
                        {!! Form::label('tax', __('product.applicable_tax') . ':') !!}
                        {!! Form::select('tax', $taxes, !empty($duplicate_product->tax) ? $duplicate_product->tax : null, ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2'], $tax_attributes); !!}
                    </div>
                </div>
                <div class="col-sm-4 @if(!session('business.enable_price_tax')) hide @endif">
                    <div class="form-group">
                        {!! Form::label('tax_type', __('product.selling_price_tax_type') . ':*') !!}
                        {!! Form::select('tax_type', ['inclusive' => __('product.inclusive'), 'exclusive' => __('product.exclusive')], !empty($duplicate_product->tax_type) ? $duplicate_product->tax_type : 'exclusive',
                        ['class' => 'form-control select2', 'required']); !!}
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('type', __('product.product_type') . ':*') !!} @show_tooltip(__('tooltip.product_type'))
                        {!! Form::select('type', $product_types, !empty($duplicate_product->type) ? $duplicate_product->type : null, ['class' => 'form-control select2',
                        'required', 'data-action' => !empty($duplicate_product) ? 'duplicate' : 'add', 'data-product_id' => !empty($duplicate_product) ? $duplicate_product->id : '0']); !!}
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="form-group col-sm-12" id="product_form_part">
                    @include('product.partials.single_product_form_part', ['profit_percent' => $default_profit_percent])
                </div>

                <input type="hidden" id="variation_counter" value="1">
                <input type="hidden" id="default_profit_percent" value="{{ $default_profit_percent }}">
            </div>
        @endcomponent



        @component('components.widget', ['class' => 'box-primary hide', 'id' => 'pre_made_div'])
            <div class="row">
                <div class="col-md-12">
                    <h5 class="box-title" style="margin-top: 0;">Configure Pre-made Product</h5>
                </div>
                <div class="clearfix"></div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" style="cursor: pointer;">
                                        <i class="fa fa-search"></i>
                                    </span>
                                    <input type="hidden" id="product_row_count" value="0">
                                    {!! Form::text('search_pre_made_product', null, ['class' => 'form-control mousetrap', 'id' => 'search_pre_made_product', 'placeholder' => __('lang_v1.search_product_placeholder')]); !!}
                                    <span class="input-group-addon" style="cursor: pointer;" data-toggle="modal" data-target="#configure_search_modal" title="{{__('lang_v1.configure_product_search')}}">
                                        <i class="fas fa-search-plus"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            
                            <table class="table table-condensed table-bordered table-th-green text-center table-striped" id="premade_entry_table">
                                
                                <thead>
                                    <tr>
                                        <th>
                                            @lang( 'product.product_name' )</th>
                                        <th>
                                            @lang( 'lang_v1.quantity' )</th>
                                        <th>
                                            @lang( 'product.default_purchase_price')({{ __('product.exc_of_tax') }})</th>
                                        <th>
                                            @lang( 'lang_v1.profit_margin' )</th>
                                        <th>
                                            @lang( 'product.default_selling_price')<small>(@lang('product.inc_of_tax'))</small></th>
                                        <th>
                                            @lang( 'product.total_amount')<small>(@lang('product.inc_of_tax'))</small></th>
                                        <th><i class="fa fa-trash" aria-hidden="true"></i></th>
                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>


                            </table>

                        </div>
                        
                        <hr/>
                        <div class="pull-right col-md-5">
                            <table class="pull-right col-md-12">
                                <tr>
                                    <th class="col-md-7 text-right">@lang( 'lang_v1.total_items' ):</th>
                                    <td class="col-md-5 text-left">
                                        <span id="total_quantity" class="display_currency" data-currency_symbol="false"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-md-7 text-right">@lang( 'purchase.net_total_amount' ):</th>
                                    <td class="col-md-5 text-left">
                                        <span id="total_subtotal" class="display_currency"></span>
                                        <!-- This is total before purchase tax-->
                                        <input type="hidden" id="total_subtotal_input" value=0  name="total_before_tax">
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <input type="hidden" id="row_count" value="0">
                    </div>
                </div>
            </div>
        @endcomponent


        <!-- Additional Details Section (Collapsible) -->
        <div id="additional_details_section" style="display: none;">
            @component('components.widget', ['class' => 'box-primary'])
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('product_description', __('lang_v1.product_description') . ':') !!}
                            {!! Form::textarea('product_description', !empty($duplicate_product->product_description) ? $duplicate_product->product_description : null, ['class' => 'form-control']); !!}
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('image', __('lang_v1.product_image') . ':') !!}
                            {!! Form::file('image', ['id' => 'upload_image', 'accept' => 'image/*',
                            'required' => $is_image_required, 'class' => 'upload-element']); !!}
                            <small>
                                <p class="help-block">@lang('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)]) <br> @lang('lang_v1.aspect_ratio_should_be_1_1')</p>
                            </small>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('product_brochure', __('lang_v1.product_brochure') . ':') !!}
                            {!! Form::file('product_brochure', ['id' => 'product_brochure', 'accept' => implode(',', array_keys(config('constants.document_upload_mimes_types')))]); !!}
                            <small>
                                <p class="help-block">
                                    @lang('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)])
                                    @includeIf('components.document_help_text')
                                </p>
                            </small>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    @if(session('business.enable_product_expiry'))
                    @if(session('business.expiry_type') == 'add_expiry')
                    @php
                    $expiry_period = 12;
                    $hide = true;
                    @endphp
                    @else
                    @php
                    $expiry_period = null;
                    $hide = false;
                    @endphp
                    @endif
                    <div class="col-sm-4 @if($hide) hide @endif">
                        <div class="form-group">
                            <div class="multi-input">
                                {!! Form::label('expiry_period', __('product.expires_in') . ':') !!}<br>
                                {!! Form::text('expiry_period', !empty($duplicate_product->expiry_period) ? @num_format($duplicate_product->expiry_period) : $expiry_period, ['class' => 'form-control pull-left input_number',
                                'placeholder' => __('product.expiry_period'), 'style' => 'width:60%;']); !!}
                                {!! Form::select('expiry_period_type', ['months'=>__('product.months'), 'days'=>__('product.days'), '' =>__('product.not_applicable') ], !empty($duplicate_product->expiry_period_type) ? $duplicate_product->expiry_period_type : 'months', ['class' => 'form-control select2 pull-left', 'style' => 'width:40%;', 'id' => 'expiry_period_type']); !!}
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="clearfix"></div>

                    <!-- Rack, Row & position number -->
                    @if(session('business.enable_racks') || session('business.enable_row') || session('business.enable_position'))
                    <div class="col-md-12">
                        <h4>@lang('lang_v1.rack_details'):
                            @show_tooltip(__('lang_v1.tooltip_rack_details'))
                        </h4>
                    </div>
                    @foreach($business_locations as $id => $location)
                    <div class="col-sm-3">
                        <div class="form-group">
                            {!! Form::label('rack_' . $id, $location . ':') !!}

                            @if(session('business.enable_racks'))
                            {!! Form::text('product_racks[' . $id . '][rack]', !empty($rack_details[$id]['rack']) ? $rack_details[$id]['rack'] : null, ['class' => 'form-control', 'id' => 'rack_' . $id,
                            'placeholder' => __('lang_v1.rack')]); !!}
                            @endif

                            @if(session('business.enable_row'))
                            {!! Form::text('product_racks[' . $id . '][row]', !empty($rack_details[$id]['row']) ? $rack_details[$id]['row'] : null, ['class' => 'form-control', 'placeholder' => __('lang_v1.row')]); !!}
                            @endif

                            @if(session('business.enable_position'))
                            {!! Form::text('product_racks[' . $id . '][position]', !empty($rack_details[$id]['position']) ? $rack_details[$id]['position'] : null, ['class' => 'form-control', 'placeholder' => __('lang_v1.position')]); !!}
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @endif

                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('weight', __('lang_v1.weight') . ':') !!}
                            {!! Form::text('weight', !empty($duplicate_product->weight) ? $duplicate_product->weight : null, ['class' => 'form-control', 'placeholder' => __('lang_v1.weight')]); !!}
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('preparation_time_in_minutes', __('lang_v1.preparation_time_in_minutes') . ':') !!}
                            {!! Form::number('preparation_time_in_minutes', !empty($duplicate_product->preparation_time_in_minutes) ? $duplicate_product->preparation_time_in_minutes : null, ['class' => 'form-control', 'placeholder' => __('lang_v1.preparation_time_in_minutes')]); !!}
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    @include('layouts.partials.module_form_part')
                </div>
            @endcomponent
        </div>

        <!-- Form Submit Buttons -->
        <div class="row">
            <div class="col-sm-12">
                <input type="hidden" name="submit_type" id="submit_type">
                <div class="text-center">
                    <div class="btn-group">
                        <button type="button" id="toggle_additional_details" class="tw-dw-btn tw-dw-btn-primary tw-dw-btn-lg">
                            <i class="fa fa-arrow-right tw-mr-2"></i> @lang('lang_v1.add_additional_details')
                        </button>

                        @can('product.opening_stock')
                        <button id="opening_stock_button" @if(!empty($duplicate_product) && $duplicate_product->enable_stock == 0) disabled @endif type="submit" value="submit_n_add_opening_stock" class="tw-dw-btn tw-dw-btn-lg tw-text-white bg-purple submit_product_form">@lang('lang_v1.save_n_add_opening_stock')</button>
                        @endcan

                        <button type="submit" value="save_n_add_another" class="tw-dw-btn tw-dw-btn-lg bg-maroon submit_product_form">@lang('lang_v1.save_n_add_another')</button>

                        <button type="submit" value="submit" class="tw-dw-btn tw-dw-btn-primary tw-dw-btn-lg tw-text-white submit_product_form">@lang('messages.save')</button>
                    </div>

                </div>
            </div>
        </div>

    {!! Form::close() !!}

</section>
<!-- /.content -->

@endsection

@section('javascript')

<script src="{{ asset('js/product.js?v=' . $asset_v) }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        __page_leave_confirmation('#product_add_form');
        onScan.attachTo(document, {
            suffixKeyCodes: [13], // enter-key expected at the end of a scan
            reactToPaste: true, // Compatibility to built-in scanners in paste-mode (as opposed to keyboard-mode)
            onScan: function(sCode, iQty) {
                $('input#sku').val(sCode);
            },
            onScanError: function(oDebug) {
                console.log(oDebug);
            },
            minLength: 2,
            ignoreIfFocusOn: ['input', '.form-control']
            // onKeyDetect: function(iKeyCode){ // output all potentially relevant key events - great for debugging!
            //     console.log('Pressed: ' + iKeyCode);
            // }
        });

        // Toggle Additional Details Section
        let additionalDetailsVisible = false;
        
        $('#toggle_additional_details').on('click', function() {
            additionalDetailsVisible = !additionalDetailsVisible;
            
            if (additionalDetailsVisible) {
                // Show additional details
                $('#additional_details_section').slideDown(400);
                $(this).html('<i class="fa fa-arrow-up tw-mr-2"></i> ' + '@lang("lang_v1.hide_additional_details")');
                $(this).removeClass('tw-dw-btn-primary').addClass('tw-dw-btn-default');
            } else {
                // Hide additional details
                $('#additional_details_section').slideUp(400);
                $(this).html('<i class="fa fa-arrow-right tw-mr-2"></i> ' + '@lang("lang_v1.add_additional_details")');
                $(this).removeClass('tw-dw-btn-default').addClass('tw-dw-btn-primary');
            }
        });

        // Handle enable_stock checkbox to show/hide alert quantity
        $('#enable_stock').on('ifChanged', function() {
            if ($(this).is(':checked')) {
                $('#alert_quantity_div').removeClass('hide');
                $('#opening_stock_button').prop('disabled', false);
            } else {
                $('#alert_quantity_div').addClass('hide');
                $('#opening_stock_button').prop('disabled', true);
            }
        });

        // Handle quick add category form submission
        $(document).on('submit', 'form#category_add_form', function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            
            var form = $(this);
            var data = form.serialize();

            $.ajax({
                method: 'POST',
                url: form.attr('action'),
                dataType: 'json',
                data: data,
                beforeSend: function(xhr) {
                    __disable_submit_button(form.find('button[type="submit"]'));
                },
                success: function(result) {
                    if (result.success == true) {
                        var newOption = new Option(result.data.name, result.data.id, true, true);
                        
                        // Check if it's a sub-category (has parent_id > 0) or main category
                        if (result.data.parent_id && result.data.parent_id != 0 && result.data.parent_id != '0') {
                            // This is a sub-category - append and select
                            var $subCategorySelect = $('#sub_category_id');
                            $subCategorySelect.append(newOption);
                            $subCategorySelect.val(result.data.id).trigger('change');
                        } else {
                            // This is a main category - append and select
                            var $categorySelect = $('#category_id');
                            $categorySelect.append(newOption);
                            $categorySelect.val(result.data.id).trigger('change');
                        }
                        
                        $('div.view_modal').modal('hide');
                        toastr.success(result.msg);
                    } else {
                        toastr.error(result.msg);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Category add error:', error);
                    toastr.error('An error occurred while adding the category');
                    form.find('button[type="submit"]').removeAttr('disabled');
                }
            });
            
            return false;
        });

        // Enter key navigation - Custom sequence for product creation form
        var navigationSequence = [
            { selector: 'input[name="name"]', id: null, name: 'name' },                    // 1. Product Name
            { selector: 'input[name="sku"]', id: null, name: 'sku' },                     // 2. SKU
            { selector: 'select#category_id', id: 'category_id', name: null },           // 3. Category
            { selector: 'select#unit_id', id: 'unit_id', name: null },                    // 4. Unit
            { selector: 'input#single_dsp', id: 'single_dsp', name: null },              // 5. Exc. tax (Selling Price)
            { selector: 'input[name="single_dpp"]', id: null, name: 'single_dpp' },     // 6. Exc. Tax (Purchase Price)
            { selector: 'button#opening_stock_button', id: 'opening_stock_button', name: null } // 7. Save & Add Opening Stock
        ];

        function getNextField(currentElement) {
            var currentIndex = -1;

            // Find current field in navigation sequence - check multiple ways
            for (var i = 0; i < navigationSequence.length; i++) {
                var field = navigationSequence[i];
                var matches = false;
                
                // Check if current element matches the field
                if (currentElement.is(field.selector)) {
                    matches = true;
                } 
                // For select2 containers, check the hidden select element
                else if (field.id && currentElement.closest('.select2-container').length > 0) {
                    var $hiddenSelect = currentElement.closest('.select2-container').prev('select');
                    if ($hiddenSelect.length && $hiddenSelect.attr('id') === field.id) {
                        matches = true;
                        currentElement = $hiddenSelect; // Update reference
                    }
                }
                // Check by ID
                else if (field.id && currentElement.attr('id') === field.id) {
                    matches = true;
                }
                // Check by name
                else if (field.name && currentElement.attr('name') === field.name) {
                    matches = true;
                }
                
                if (matches) {
                    currentIndex = i;
                    break;
                }
            }

            // If not found in sequence, return null
            if (currentIndex === -1) {
                return null;
            }

            // Get next field in sequence - skip invisible/disabled fields
            for (var j = currentIndex + 1; j < navigationSequence.length; j++) {
                var nextField = navigationSequence[j];
                var $nextField = $(nextField.selector);
                
                // If element not found, try alternative selector
                if (!$nextField.length && nextField.id) {
                    $nextField = $('#' + nextField.id);
                }
                if (!$nextField.length && nextField.name) {
                    $nextField = $('input[name="' + nextField.name + '"]');
                }
                
                // If field found and it's accessible, return it
                if ($nextField.length) {
                    var isVisible = $nextField.is(':visible') && 
                                   $nextField.closest('.hide').length === 0 &&
                                   !$nextField.parent().hasClass('hide');
                    
                    // For Exc. tax fields and buttons, be more lenient
                    var isSpecialField = $nextField.attr('id') === 'single_dsp' || 
                                        $nextField.attr('name') === 'single_dpp' ||
                                        $nextField.attr('id') === 'opening_stock_button';
                    
                    if ((isVisible || isSpecialField) && !$nextField.is(':disabled') && !$nextField.prop('disabled')) {
                        return $nextField;
                    }
                }
            }
            
            // If all remaining fields are skipped, return null
            return null;
        }

        // Function to navigate to next field
        function navigateToNext($currentField) {
            var $nextField = getNextField($currentField);
            
            if (!$nextField || !$nextField.length) {
                return;
            }
            
            // getNextField already checks visibility, so just navigate
            if ($nextField.is('select') && $nextField.hasClass('select2-hidden-accessible')) {
                // For Select2 dropdowns, open them and focus
                setTimeout(function() {
                    $nextField.select2('open');
                }, 50);
            } else if ($nextField.is('button')) {
                // Focus button
                $nextField.focus();
            } else {
                // Focus input field - scroll into view if needed
                if ($nextField[0] && $nextField[0].scrollIntoView) {
                    $nextField[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
                setTimeout(function() {
                    $nextField.focus();
                    if ($nextField.is('input[type="text"], input[type="number"]')) {
                        $nextField.select();
                    }
                }, 100);
            }
        }

        // Handle Enter key on form fields (inputs)
        $('#product_add_form').on('keydown', 'input[type="text"], input[type="number"]', function(e) {
            if (e.keyCode === 13 || e.which === 13) {
                e.preventDefault();
                
                // Check if this is one of our navigation sequence fields
                var $currentField = $(this);
                var isInSequence = false;
                
                for (var i = 0; i < navigationSequence.length; i++) {
                    var field = navigationSequence[i];
                    if ((field.id && $currentField.attr('id') === field.id) || 
                        (field.name && $currentField.attr('name') === field.name)) {
                        isInSequence = true;
                        break;
                    }
                }
                
                if (isInSequence) {
                    navigateToNext($currentField);
                }
                
                return false;
            }
        });

        // Handle Enter on select elements (Category, Unit) - open dropdown first time
        $('#category_id, #unit_id').on('keydown', function(e) {
            if (e.keyCode === 13 || e.which === 13) {
                var $select = $(this);
                
                // If not in sequence (shouldn't happen, but safety check)
                // Otherwise, open the dropdown
                if ($select.hasClass('select2-hidden-accessible')) {
                    e.preventDefault();
                    $select.select2('open');
                    return false;
                }
            }
        });

        // Handle Enter on Select2 search field (when typing in dropdown)
        $(document).on('keydown', '.select2-search__field', function(e) {
            if (e.keyCode === 13 || e.which === 13) {
                var $select2 = $(this).closest('.select2-container').prev('select');
                if ($select2.length && ($select2.attr('id') === 'category_id' || $select2.attr('id') === 'unit_id')) {
                    // Wait for select2 to close, then navigate
                    setTimeout(function() {
                        if ($select2.val()) {
                            navigateToNext($select2);
                        }
                    }, 250);
                }
            }
        });

        // Handle Enter on Select2 selection element
        $(document).on('keydown', '.select2-container .select2-selection', function(e) {
            if (e.keyCode === 13 || e.which === 13) {
                var $container = $(this).closest('.select2-container');
                var $select = $container.prev('select');
                
                // Only handle if it's category or unit
                if ($select.length && ($select.attr('id') === 'category_id' || $select.attr('id') === 'unit_id')) {
                    // If dropdown is open, close it first
                    if ($container.hasClass('select2-container--open')) {
                        // Let select2 handle the close
                        return true;
                    } else {
                        // Dropdown is closed - check if we just navigated here
                        // If value is already selected, navigate to next
                        // If no value selected, open dropdown
                        if ($select.val() && $select.val() !== '' && $select.val() !== null) {
                            // Has value, navigate to next
                            e.preventDefault();
                            e.stopPropagation();
                            navigateToNext($select);
                            return false;
                        } else {
                            // No value, open dropdown
                            e.preventDefault();
                            $select.select2('open');
                            return false;
                        }
                    }
                }
            }
        });

        // When Select2 closes, focus the selection element and set up for next Enter
        $('#category_id, #unit_id').on('select2:close', function(e) {
            var $select = $(this);
            var $container = $select.next('.select2-container');
            var $selection = $container.find('.select2-selection');
            
            // Focus the selection after dropdown closes
            setTimeout(function() {
                $selection.focus();
            }, 100);
        });

        // Make Select2 containers focusable and handle Enter key properly
        setTimeout(function() {
            $('#category_id, #unit_id').each(function() {
                var $select = $(this);
                var $container = $select.next('.select2-container');
                
                if ($container.length) {
                    var $selection = $container.find('.select2-selection');
                    // Make selection focusable
                    if (!$selection.attr('tabindex')) {
                        $selection.attr('tabindex', '0');
                    }
                }
            });
        }, 300);

        // Also handle Enter when select2 selection element is focused (catch-all for category and unit)
        // This is handled by the specific handlers above, but kept as fallback

        // Handle Enter key on Save & Add Opening Stock button to submit form
        $(document).on('keydown', 'button#opening_stock_button', function(e) {
            if (e.keyCode === 13 || e.which === 13) {
                e.preventDefault();
                $(this).click(); // Trigger the button click to submit form
                return false;
            }
        });
    });
</script>

<style>
    /* Compact form styling */
    #product_add_form .form-group {
        margin-bottom: 12px;
    }

    #product_add_form .box-primary {
        padding: 15px;
    }

    #product_add_form label {
        margin-bottom: 5px;
        font-weight: 500;
    }

    #product_add_form .help-block {
        margin-top: 3px;
        margin-bottom: 0;
    }

    /* Section headings minimal spacing */
    #product_add_form h5 {
        margin-top: 0;
        margin-bottom: 8px;
    }

    /* Two column layout spacing */
    #product_add_form .col-md-8.tw-border-r {
        padding-right: 20px;
    }

    #product_add_form .col-md-4:not(.tw-border-r) {
        padding-left: 20px;
    }

    /* Additional details section animation */
    #additional_details_section {
        overflow: hidden;
    }

    /* Ensure alert_quantity works with enable_stock */
    #alert_quantity_div {
        transition: all 0.3s ease;
    }

    /* Toggle button styling */
    #toggle_additional_details {
        transition: all 0.3s ease;
    }

    /* Compact select2 and form controls */
    #product_add_form .select2-container {
        width: 100% !important;
    }

    #product_add_form .form-control {
        height: 34px;
        padding: 6px 12px;
    }

    #product_add_form textarea.form-control {
        height: auto;
    }

    /* Compact row spacing */
    #product_add_form .row {
        margin-left: -10px;
        margin-right: -10px;
    }

    #product_add_form .row > div[class*="col-"] {
        padding-left: 10px;
        padding-right: 10px;
    }

    /* Responsive - stack columns on mobile */
    @media (max-width: 768px) {
        #product_add_form .col-md-6.tw-border-r {
            border-right: none !important;
            padding-right: 15px;
            margin-bottom: 20px;
        }
        
        #product_add_form .col-md-6:not(.tw-border-r) {
            padding-left: 15px;
        }
    }
</style>
@endsection
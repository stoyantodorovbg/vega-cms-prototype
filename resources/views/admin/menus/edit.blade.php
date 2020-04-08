@extends('admin.layouts.app')

@section('content')
    <div class="row pr-4 pt-2">
        <div class="col-12 mb-3">
            <button-link :prop_data="{
                'url': '{{ route('admin-menus.index') }}',
                'text': '{{ phrase('buttons.all_menus') }}',
                'htmlClass': 'btn btn-main float-right m-1 text-capitalize'
            }"
            ></button-link>
            <button-link :prop_data="{
                'url': '{{ route('admin-menus.show', $menu->getSlug()) }}',
                'text': '{{ phrase('buttons.show_menu') }}',
                'htmlClass': 'btn btn-danger float-right m-1 text-capitalize'
            }"
            ></button-link>
        </div>
        <div class="col-12 pr-3">
            @include('admin.menus._form')
        </div>
    </div>
    <button-link :prop_data="{
        'url': '{{ route('admin-menu-items.index', ['menu' => $menu->id, 'menuItem' => 0]) }}',
        'text': '{{ phrase('buttons.show-child-menu-items') }}',
        'htmlClass': 'btn btn-main float-right m-1 text-capitalize'
        }"
    ></button-link>
@endsection

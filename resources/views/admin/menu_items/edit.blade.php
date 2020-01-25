@extends('admin.layouts.app')

@section('content')
    <div class="row pr-4 pt-2">
        <div class="col-12 mb-3">
            @if($menuItem->parent_id)
                <button-link :prop_data="{
                    'url': '{{ route('admin-menu-items.show', $menuItem->id) }}',
                    'text': '{{ phrase('buttons.parent_menu_item') }}',
                    'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
                    }"
                ></button-link>
            @else
                <button-link :prop_data="{
                    'url': '{{ route('admin-menus.show', $menuItem->menu_id) }}',
                    'text': '{{ phrase('buttons.menu') }}',
                    'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
                    }"
                ></button-link>
            @endif
            <button-link :prop_data="{
                'url': '{{ route('admin-menu-items.show', $menuItem->getSlug()) }}',
                'text': '{{ phrase('buttons.show_menu_item') }}',
                'htmlClass': 'btn btn-danger float-right m-1 text-capitalize'
                }"
            ></button-link>
        </div>
        <div class="col-12 pr-3">
            @include('admin.menu_items._form')
        </div>
    </div>
    @if($menuItem->childMenuItems->count())
        <button-link :prop_data="{
            'url': '{{ route('admin-menu-items.index', ['menu' => $menuItem->menu->id, 'menuItem' => $menuItem->id]) }}',
            'text': '{{ phrase('buttons.show_parent_menu_items') }}',
            'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
            }"
        ></button-link>
    @endif
@endsection

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
    @if($menuItem->parent_id)
        <button-link :prop_data="{
            'url': '{{ route('admin-menu-items.show', ['menu' => $menuItem->parentMenuItem->getSlug()]) }}',
            'text': '{{ phrase('buttons.parent_menu_item_menu_show') }}',
            'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
            }"
        ></button-link>
        <button-link :prop_data="{
            'url': '{{ route('admin-menu-items.edit', ['menu' => $menuItem->parentMenuItem->getSlug()]) }}',
            'text': '{{ phrase('buttons.parent_menu_item_edit_menu_edit') }}',
            'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
            }"
        ></button-link>
    @else
        <button-link :prop_data="{
            'url': '{{ route('admin-menus.show', ['menu' => $menuItem->menu->getSlug()]) }}',
            'text': '{{ phrase('buttons.menu_show') }}',
            'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
            }"
        ></button-link>
        <button-link :prop_data="{
            'url': '{{ route('admin-menus.edit', ['menu' => $menuItem->menu->getSlug()]) }}',
            'text': '{{ phrase('buttons.menu_edit') }}',
            'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
            }"
        ></button-link>
    @endif
    @if($menuItem->childMenuItems->count())
        <button-link :prop_data="{
            'url': '{{ route('admin-menu-items.index', ['menu' => $menuItem->menu->getSlug(), 'menuItem' => $menuItem->id]) }}',
            'text': '{{ phrase('buttons.show_child_menu_items') }}',
            'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
            }"
        ></button-link>
    @endif
@endsection

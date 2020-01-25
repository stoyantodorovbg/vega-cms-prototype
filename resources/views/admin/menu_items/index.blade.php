@extends('admin.layouts.app')

@section('content')
    <model-index :model_name="'MenuItem'"
                 :actions="{
                        'show': 1,
                        'edit': 1,
                        'delete': 1
                    }"
                 :default_filters="{{ $defaultFilters }}"
    ></model-index>
    <button-link :prop_data="{
        'url': '{{ route('admin-menus.show', ['menu' => $menuSlug]) }}',
        'text': '{{ phrase('buttons.menu_show') }}',
        'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
        }"
    ></button-link>
    <button-link :prop_data="{
        'url': '{{ route('admin-menus.edit', ['menu' => $menuSlug]) }}',
        'text': '{{ phrase('buttons.menu_edit') }}',
        'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
        }"
    ></button-link>
@endsection

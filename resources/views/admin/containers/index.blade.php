@extends('admin.layouts.app')

@section('content')
    <model-index :model_name="'Container'"
                 :actions="{
                        'show': 1,
                        'edit': 1,
                        'delete': 1
                    }"
                 :default_filters="{{ $defaultFilters }}"
    ></model-index>
    <button-link :prop_data="{
        'url': '{{ route('admin-pages.show', ['page' => $pageSlug]) }}',
        'text': '{{ phrase('buttons.show-page') }}',
        'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
        }"
    ></button-link>
    <button-link :prop_data="{
        'url': '{{ route('admin-pages.edit', ['page' => $pageSlug]) }}',
        'text': '{{ phrase('buttons.edit_page') }}',
        'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
        }"
    ></button-link>
@endsection

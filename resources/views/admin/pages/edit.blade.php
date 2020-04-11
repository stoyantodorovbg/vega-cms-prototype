@extends('admin.layouts.app')

@section('content')
    <div class="row pr-4 pt-2">
        <div class="col-12 mb-3">
            <button-link :prop_data="{
                'url': '{{ route('admin-pages.index') }}',
                'text': '{{ phrase('buttons.all-pages') }}',
                'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
                }"
            ></button-link>
            <button-link :prop_data="{
                'url': '{{ route('admin-pages.show', $page->getSlug()) }}',
                'text': '{{ phrase('buttons.show-page') }}',
                'htmlClass': 'btn btn-danger float-right m-1 text-capitalize'
                }"
            ></button-link>
        </div>
        <div class="col-12 pr-3">
            @include('admin.pages._form')
        </div>
    </div>
    <button-link :prop_data="{
        'url': '{{ route('admin-containers.index', ['page' => $page->id, 'container' => 0]) }}',
        'text': '{{ phrase('buttons.show-page-containers') }}',
        'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
        }"
    ></button-link>
@endsection

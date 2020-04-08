@extends('admin.layouts.app')

@section('content')
    <div class="row pr-4 pt-2">
        <div class="col-12  mb-3">
            <button-link :prop_data="{
                'url': '{{ route('admin-phrases.index') }}',
                'text': '{{ phrase('buttons.all-phrases') }}',
                'htmlClass': 'btn btn-main float-right m-1 text-capitalize'
            }"
            ></button-link>
            <button-link :prop_data="{
                'url': '{{ route('admin-phrases.show', $phrase->getSlug()) }}',
                'text': '{{ phrase('buttons.show-phrase') }}',
                'htmlClass': 'btn btn-danger float-right m-1 text-capitalize'
            }"
            ></button-link>
        </div>
        <div class="col-12 pr-3">
            @include('admin.phrases._form')
        </div>
    </div>
@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="row pr-4 pt-2">
        <div class="col-12 mb-3">
            <button-link :prop_data="{
                'url': '{{ route('admin-users.index') }}',
                'text': '{{ phrase('buttons.all-users') }}',
                'htmlClass': 'btn btn-main float-right m-1 text-capitalize'
            }"
            ></button-link>
            <button-link :prop_data="{
                'url': '{{ route('admin-users.show', $user->getSlug()) }}',
                'text': '{{ phrase('buttons.show-user') }}',
                'htmlClass': 'btn btn-danger float-right m-1 text-capitalize'
            }"
            ></button-link>
        </div>
        <div class="col-12 pr-3">
            @include('admin.users._form')
        </div>
    </div>
@endsection

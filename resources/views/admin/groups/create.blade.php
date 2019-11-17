@extends('admin.layouts.app')

@section('content')
    <div class="row pr-4 pt-2">
        <div class="col-12 mb-3">
            <button-link :prop_data="{
                'url': '{{ route('admin-groups.index') }}',
                'text': '{{ phrase('buttons.all-user-groups') }}',
                'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
            }"
            ></button-link>
        </div>
        <div class="col-12 pr-3">
            @include('admin.groups._form')
        </div>
    </div>
@endsection


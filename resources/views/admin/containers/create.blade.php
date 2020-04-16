@extends('admin.layouts.app')

@section('content')
    <div class="row pr-4 pt-2">
        <div class="col-12 mb-3">
            <button-link :prop_data="{
                'url': '{{ route('admin-containers.index') }}',
                'text': '{{ phrase('buttons.all_containers') }}',
                'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
                }"
            ></button-link>
        </div>
        <div class="col-12 pr-3">
            @include('admin.containers._form')
        </div>
    </div>
@endsection

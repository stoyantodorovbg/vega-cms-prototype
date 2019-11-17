@extends('admin.layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-12 pr-4 pt-2">
            <div class="mb-3 mt-1">
                <button-link :prop_data="{
                    'url': '{{ route('admin-phrases.index') }}',
                    'text': '{{ phrase('buttons.all-phrases') }}',
                    'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
                }"
                ></button-link>
                <button-link :prop_data="{
                    'url': '{{ route('admin-phrases.edit', $phrase->getSlug()) }}',
                    'text': '{{ phrase('buttons.edit-phrase') }}',
                    'htmlClass': 'btn btn-danger float-right m-1 text-capitalize'
                }"
                ></button-link>
            </div>
            <div class="pt-5">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="text-uppercase">{{ phrase('labels.field_name') }}</th>
                        <th class="text-uppercase">{{ phrase('labels.value') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>{{ phrase('labels.id') }}</th>
                        <td>{{ $phrase->id }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.system_name') }}</th>
                        <td>{{ $phrase->system_name }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.text') }}</th>
                        <td>{{ $phrase->text }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.created_at') }}</th>
                        <td>{{ $phrase->created_at }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.updated_at') }}</th>
                        <td>{{ $phrase->updated_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-10">
            <button-link :prop_data="{
                'url': '{{ route('admin-locales.index') }}',
                'text': '{{ phrase('labels.all-locales') }}',
                'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
            }"
            ></button-link>
            <button-link :prop_data="{
                'url': '{{ route('admin-locales.edit', $locale->getSlug()) }}',
                'text': '{{ phrase('labels.edit-locale') }}',
                'htmlClass': 'btn btn-danger float-right m-1 text-capitalize'
            }"
            ></button-link>
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
                    <td>{{ $locale->id }}</td>
                </tr>
                <tr>
                    <th class="text-capitalize">{{ phrase('labels.language') }}</th>
                    <td>{{ $locale->language }}</td>
                </tr>
                <tr>
                    <th class="text-capitalize">{{ phrase('labels.code') }}</th>
                    <td>{{ $locale->code }}</td>
                </tr><tr>
                    <th>{{ phrase('labels.status') }}</th>
                    <td>{{ $locale->status }}</td>
                </tr>
                <tr>
                    <th class="text-capitalize">{{ phrase('labels.add_to_url') }}</th>
                    <td>{{ $locale->add_to_url }}</td>
                </tr>
                <tr>
                    <th class="text-capitalize">{{ phrase('labels.created_at') }}</th>
                    <td>{{ $locale->created_at }}</td>
                </tr>
                <tr>
                    <th class="text-capitalize">{{ phrase('labels.updated_at') }}</th>
                    <td>{{ $locale->updated_at }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

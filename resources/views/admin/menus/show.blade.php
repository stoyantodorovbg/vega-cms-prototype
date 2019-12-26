@extends('admin.layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-12  pr-4 pt-2">
            <div class="mb-3 mt-1">

                <button-link :prop_data="{
                    'url': '{{ route('admin-menus.index') }}',
                    'text': '{{ phrase('buttons.all-menus') }}',
                    'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
                }"
                ></button-link>
                <button-link :prop_data="{
                    'url': '{{ route('admin-menus.show', $menu->getSlug()) }}',
                    'text': '{{ phrase('buttons.show-menu') }}',
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
                        <td>{{ $menu->id }}</td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th class="text-capitalize">{{ phrase('labels.language') }}</th>--}}
{{--                        <td>{{ $menu->language }}</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th class="text-capitalize">{{ phrase('labels.code') }}</th>--}}
{{--                        <td>{{ $menu->code }}</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th class="text-capitalize">{{ phrase('labels.add_to_url') }}</th>--}}
{{--                        <td>{{ $menu->add_to_url }}</td>--}}
{{--                    </tr>--}}
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.created_at') }}</th>
                        <td>{{ $menu->created_at }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.updated_at') }}</th>
                        <td>{{ $menu->updated_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

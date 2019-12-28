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
                    'url': '{{ route('admin-menus.edit', $menu->getSlug()) }}',
                    'text': '{{ phrase('buttons.edit-menu') }}',
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
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.title') }}</th>
                        <td>
                            <json-presenter :json_data="{{ $menu->title }}"></json-presenter>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.status') }}</th>
                        <td>{{ $menu->status }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.description') }}</th>
                        <td>
                            <json-presenter :json_data="{{ $menu->description }}"></json-presenter>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.classes') }}</th>
                        <td>{{ $menu->classes }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.styles') }}</th>
                        <td>
                            <json-presenter :json_data="{{ $menu->styles }}"></json-presenter>
                        </td>
                    </tr>
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

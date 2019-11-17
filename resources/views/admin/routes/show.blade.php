@extends('admin.layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-12 pr-4 pt-2">
            <div class="mb-3 mt-1">
                <button-link :prop_data="{
                    'url': '{{ route('admin-routes.index') }}',
                    'text': '{{ phrase('buttons.all-routes') }}',
                    'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
                }"
                ></button-link>
                <button-link :prop_data="{
                    'url': '{{ route('admin-routes.edit', $route->getSlug()) }}',
                    'text': '{{ phrase('buttons.edit-route') }}',
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
                        <td>{{ $route->id }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.url') }}</th>
                        <td>{{ $route->url }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.method') }}</th>
                        <td>{{ $route->method }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.action') }}</th>
                        <td>{{ $route->action }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.route_type') }}</th>
                        <td>{{ $route->route_type }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.created_at') }}</th>
                        <td>{{ $route->created_at }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.updated_at') }}</th>
                        <td>{{ $route->updated_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

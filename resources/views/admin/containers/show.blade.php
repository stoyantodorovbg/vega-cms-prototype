@extends('admin.layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-12  pr-4 pt-2">
            <div class="mb-3 mt-1">

                <button-link :prop_data="{
                    'url': '{{ route('admin-containers.index', ['page' => null, 'container' => $container->id]) }}',
                    'text': '{{ phrase('buttons.show-page-containers') }}',
                    'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
                    }"
                ></button-link>
{{--                <button-link :prop_data="{--}}
{{--                    'url': '{{ route('admin-containers.index') }}',--}}
{{--                    'text': '{{ phrase('buttons.all_containers') }}',--}}
{{--                    'htmlClass': 'btn btn-success float-right m-1 text-capitalize'--}}
{{--                    }"--}}
{{--                ></button-link>--}}
                <button-link :prop_data="{
                    'url': '{{ route('admin-containers.edit', $container->getSlug()) }}',
                    'text': '{{ phrase('buttons.edit_container') }}',
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
                        <th class="text-capitalize">{{ phrase('labels.id') }}</th>
                        <td>{{ $container->id }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.status') }}</th>
                        <td>{{ $container->status }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.parent_containers') }}</th>
                        <td>
                            @foreach($container->parentContainers as $item)
                                <a href="{{ route('admin-containers.edit', $item->getSlug()) }}">
                                    {{ $item->id . ' - ' . $item->semantic_tag }} @if(!$loop->last){{ '| ' }}@endif
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.semantic_tag') }}</th>
                        <td>{{ $container->semantig_tag }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.row_position') }}</th>
                        <td>{{ $container->row_position }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.col_position') }}</th>
                        <td>{{ $container->col_position }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.col_width') }}</th>
                        <td>{{ $container->col_width }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.row_classes') }}</th>
                        <td>{{ $container->row_classes }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.classes') }}</th>
                        <td>{{ $container->classes }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.title') }}</th>
                        <td>
                            <json-presenter :json_data="{{ $container->title }}"></json-presenter>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.summary') }}</th>
                        <td>
                            <json-presenter :json_data="{{ $container->summary }}"></json-presenter>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.body') }}</th>
                        <td>
                            <json-presenter :json_data="{{ $container->body }}"></json-presenter>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.styles') }}</th>
                        <td>
                            <json-presenter :json_data="{{ $container->styles }}"></json-presenter>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.created_at') }}</th>
                        <td>{{ $container->created_at }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.updated_at') }}</th>
                        <td>{{ $container->updated_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <button-link :prop_data="{
                'url': '{{ route('admin-containers.index', ['container' => $container->id]) }}',
                'text': '{{ phrase('buttons.show_child_containers') }}',
                'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
                }"
            ></button-link>
        </div>
    </div>
@endsection

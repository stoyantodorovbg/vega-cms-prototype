@extends('admin.layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-12  pr-4 pt-2">
            <div class="mb-3 mt-1">

                <button-link :prop_data="{
                    'url': '{{ route('admin-pages.index') }}',
                    'text': '{{ phrase('buttons.all_pages') }}',
                    'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
                    }"
                ></button-link>
                <button-link :prop_data="{
                    'url': '{{ route('admin-pages.edit', $page->getSlug()) }}',
                    'text': '{{ phrase('buttons.edit_page') }}',
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
                        <td>{{ $page->id }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.url') }}</th>
                        <td>{{ $page->url }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.status') }}</th>
                        <td>{{ $page->status }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.col_width') }}</th>
                        <td>{{ $page->col_width }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.classes') }}</th>
                        <td>{{ $page->classes }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.outer_row_classes') }}</th>
                        <td>{{ $page->outer_row_classes }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.inner_row_classes') }}</th>
                        <td>{{ $page->inner_row_classes }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.title') }}</th>
                        <td>{{ $page->title }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.description') }}</th>
                        <td>{{ $page->description }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.meta_tags') }}</th>
                        <td>
                            <json-presenter :json_data="{{ $page->meta_tags }}"></json-presenter>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.styles') }}</th>
                        <td>
                            <json-presenter :json_data="{{ $page->styles }}"></json-presenter>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.created_at') }}</th>
                        <td>{{ $page->created_at }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.updated_at') }}</th>
                        <td>{{ $page->updated_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <button-link :prop_data="{
                'url': '{{ route('admin-containers.index', ['page' => $page->id, 'container' => 0]) }}',
                'text': '{{ phrase('buttons.show-page-containers') }}',
                'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
                }"
            ></button-link>
        </div>
    </div>
@endsection

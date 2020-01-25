@extends('admin.layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-12  pr-4 pt-2">
            <div class="mb-3 mt-1">

                @if($menuItem->parent_id)
                    <button-link :prop_data="{
                        'url': '{{ route('admin-menu-items.show', $menuItem->parent_id) }}',
                        'text': '{{ phrase('buttons.parent-menu-item') }}',
                        'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
                        }"
                    ></button-link>
                @else
                    <button-link :prop_data="{
                        'url': '{{ route('admin-menus.show', $menuItem->menu_id) }}',
                        'text': '{{ phrase('buttons.menu') }}',
                        'htmlClass': 'btn btn-success float-right m-1 text-capitalize'
                        }"
                    ></button-link>
                @endif

                <button-link :prop_data="{
                    'url': '{{ route('admin-menu-items.edit', $menuItem->getSlug()) }}',
                    'text': '{{ phrase('buttons.edit_menu_item') }}',
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
                        <td>{{ $menuItem->id }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.title') }}</th>
                        <td>
                            <json-presenter :json_data="{{ $menuItem->title }}"></json-presenter>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.status') }}</th>
                        <td>{{ $menuItem->status }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.description') }}</th>
                        <td>
                            <json-presenter :json_data="{{ $menuItem->description }}"></json-presenter>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.classes') }}</th>
                        <td>{{ $menuItem->classes }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.styles') }}</th>
                        <td>
                            <json-presenter :json_data="{{ $menuItem->styles }}"></json-presenter>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.created_at') }}</th>
                        <td>{{ $menuItem->created_at }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.updated_at') }}</th>
                        <td>{{ $menuItem->updated_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

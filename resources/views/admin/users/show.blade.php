@extends('admin.layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-12 pr-4 pt-2">
            <div class="mb-3 mt-1">
                <button-link :prop_data="{
                    'url': '{{ route('admin-users.index') }}',
                    'text': '{{ phrase('buttons.all-users') }}',
                    'htmlClass': 'btn btn-main float-right m-1 text-capitalize'
                }"
                ></button-link>
                <button-link :prop_data="{
                    'url': '{{ route('admin-users.edit', $user->getSlug()) }}',
                    'text': '{{ phrase('buttons.edit-user') }}',
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
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.name') }}</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.email') }}</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.email_verified_at') }}</th>
                        <td>{{ $user->email_verified_at }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.created_at') }}</th>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">{{ phrase('labels.updated_at') }}</th>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


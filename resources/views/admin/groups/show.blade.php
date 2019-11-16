@extends('admin.layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-10">
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
                    <td>{{ $group->id }}</td>
                </tr>
                <tr>
                    <th class="text-capitalize">{{ phrase('labels.status') }}</th>
                    <td>{{ $group->status }}</td>
                </tr>
                <tr>
                    <th class="text-capitalize">{{ phrase('labels.title') }}</th>
                    <td>{{ $group->title }}</td>
                </tr><tr>
                    <th>{{ phrase('labels.description') }}</th>
                    <td>{{ $group->description }}</td>
                </tr>
                <tr>
                    <th class="text-capitalize">{{ phrase('labels.created_at') }}</th>
                    <td>{{ $group->created_at }}</td>
                </tr>
                <tr>
                    <th class="text-capitalize">{{ phrase('labels.updated_at') }}</th>
                    <td>{{ $group->updated_at }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection


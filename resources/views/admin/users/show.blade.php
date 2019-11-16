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
                        <th >{{ phrase('labels.id') }}</th>
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
@endsection


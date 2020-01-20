@extends('admin.layouts.app')

@section('content')
    <model-index :model_name="'MenuItem'"
                 :actions="{
                        'show': 1,
                        'edit': 1,
                        'delete': 1
                    }"
                 :default_filters="{{ $defaultFilters }}"
    ></model-index>
@endsection

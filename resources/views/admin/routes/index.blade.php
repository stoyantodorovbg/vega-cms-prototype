@extends('admin.layouts.app')

@section('content')
    <model-index :model_name="'Route'"
                 :actions="{
                        'show': 1,
                        'edit': 0
                    }"
    ></model-index>
@endsection


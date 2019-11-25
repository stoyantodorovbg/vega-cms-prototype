@extends('admin.layouts.app')

@section('content')
    <model-index :model_name="'Phrase'"
                 :actions="{
                        'show': 1,
                        'edit': 1
                    }"
    ></model-index>
@endsection


<form method="POST"
      action="{{ isset($container) ? route('admin-containers.update', $container->getSlug()) : route('admin-containers.store') }}"
>
    @csrf
    @if(isset($container)) @method('PATCH') @endif
    <div class="row">
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.parent_containers') }}</label>
            <select class="form-control text-capitalize" name="parent_containers[]" id="admin-form-locale-status" multiple>
                @foreach($activeContainers as $item)
                    <option {{ isset($container) && in_array($item->id, $parentContainersIds) ? 'selected' : '' }}
                            value="{{ $item->id }}"
                    >
                        {{ $item->id . ' - '  . $item->semantic_tag}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.status') }}</label>
            <select class="form-control text-capitalize" name="status" id="admin-form-locale-status">
                <option>{{ phrase('labels.choose_status') }}</option>
                <option {{ isset($container) && $container->status === 1 ? 'selected' : '' }} value="1">
                    {{ phrase('labels.active') }}
                </option>
                <option {{ isset($container) && $container->status === 0 ? 'selected' : '' }} value="0">
                    {{ phrase('labels.inactive') }}
                </option>
            </select>
        </div>
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.semantic_tag') }}</label>
            <input type="text"
                   name="semantic_tag"
                   value="{{ isset($container) ? old('semantic_tag', $container->semantic_tag) : '' }}"
                   id="admin-form-container-semantic_tag"
                   class="form-control"
            >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.row_position') }}</label>
            <input type="number"
                   name="row_position"
                   value="{{ isset($container) ? old('row_position', $container->row_position) : '' }}"
                   id="admin-form-container-row_position"
                   class="form-control"
            >
        </div>
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.col_position') }}</label>
            <input type="number"
                   name="col_position"
                   value="{{ isset($container) ? old('col_position', $container->col_position) : '' }}"
                   id="admin-form-container-col_position"
                   class="form-control"
            >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.col_width') }}</label>
            <input type="number"
                   name="col_width"
                   value="{{ isset($container) ? old('col_width', $container->col_width) : '' }}"
                   id="admin-form-container-col_width"
                   class="form-control"
            >
        </div>
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.row_classes') }}</label>
            <input type="text"
                   name="row_classes"
                   value="{{ isset($container) ? old('row_classes', $container->row_classes) : '' }}"
                   id="admin-form-container-row_classes"
                   class="form-control"
            >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.classes') }}</label>
            <input type="text"
                   name="classes"
                   value="{{ isset($container) ? old('classes', $container->classes) : '' }}"
                   id="admin-form-container-classes"
                   class="form-control"
            >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.title') }}</label>
            <json-input json_data="{{ isset($container) ? $container->title : $defaultJsonFieldsData['title'] }}"
                        input_name="title"
                        :level="1"
            ></json-input>
        </div>
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.summary') }}</label>
            <json-input json_data="{{ isset($container) ? $container->summary : $defaultJsonFieldsData['summary'] }}"
                        input_name="summary"
                        :level="1"
            ></json-input>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.body') }}</label>
            <json-input json_data="{{ isset($container) ? $container->body : $defaultJsonFieldsData['body'] }}"
                        input_name="body"
                        :level="1"
            ></json-input>
        </div>
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.styles') }}</label>
            <json-input json_data="{{ isset($container) ? $container->styles : $defaultJsonFieldsData['styles'] }}"
                        input_name="styles"
                        :level="1"
            ></json-input>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <button type="submit" class="btn btn-primary float-right text-uppercase pl-5 pr-5">
                {{ phrase('buttons.submit') }}
            </button>
        </div>

    </div>
</form>

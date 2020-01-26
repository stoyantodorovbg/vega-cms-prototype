<form method="POST"
      action="{{ isset($menuItem) ? route('admin-menu-items.update', $menuItem->getSlug()) : route('admin-menu-items.create') }}"
>
    @csrf
    @if(isset($menuItem))
        @method('PATCH')
    @endif
    <div class="row">
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.status') }}</label>
            <select class="form-control text-capitalize" name="status" id="admin-form-locale-status">
                <option>{{ phrase('labels.choose_status') }}</option>
                <option {{ isset($menuItem) && $menuItem->status === 1 ? 'selected' : '' }} value="1">
                    {{ phrase('labels.active') }}
                </option>
                <option {{ isset($menuItem) && $menuItem->status === 0 ? 'selected' : '' }} value="0">
                    {{ phrase('labels.inactive') }}
                </option>
            </select>
        </div>
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.classes') }}</label>
            <input type="text"
                   name="classes"
                   value="{{ isset($menuItem) ? old('name', $menuItem->classes) : '' }}"
                   id="admin-form-user-classes"
                   class="form-control"
            >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.title') }}</label>
            <json-input json_data="{{ isset($menuItem) ? $menuItem->title :  $defaultJsonFieldsData['title']}}"
                        input_name="title"
                        level="1"
            ></json-input>
        </div>
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.description') }}</label>
            <json-input json_data="{{ isset($menuItem) ? $menuItem->description :  $defaultJsonFieldsData['description'] }}"
                        input_name="description"
                        level="1"
            ></json-input>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.styles') }}</label>
            <json-input json_data="{{ isset($menuItem) ? $menuItem->styles :  $defaultJsonFieldsData['styles'] }}"
                        input_name="styles"
                        level="1"
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



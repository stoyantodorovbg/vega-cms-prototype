<form method="POST"
      action="{{ isset($menuItem) ? route('admin-menu-items.update', $menuItem->getSlug()) : route('admin-menu-items.store') }}"
>
    @csrf
    @if(isset($menuItem))
        @method('PATCH')
    @endif
    <div class="row">
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.menu') }}</label>
            <select class="form-control text-capitalize" name="menu_id" id="admin-form-locale-status">
                <option>{{ phrase('labels.choose_menu') }}</option>
                @foreach($menus as $id => $titleData)
                    <option {{ isset($menuItem) && $menuItem->status === 1 ? 'selected' : '' }} value="{{ $id }}">
                        {{ json_decode($titleData, true)['text'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.url') }}</label>
            <input type="text"
                   name="url"
                   value="{{ isset($menuItem) ? old('name', $menuItem->url) : '' }}"
                   id="admin-form-user-classes"
                   class="form-control"
            >
        </div>
{{--        <div class="form-group col-6">--}}
{{--            <label class="text-uppercase">{{ phrase('labels.attach_to_menu_item') }}</label>--}}
{{--            <select class="form-control text-capitalize" name="parent_id" id="admin-form-locale-status">--}}
{{--                <option>{{ phrase('labels.choose_menu') }}</option>--}}
{{--                @foreach($menuItems as $id => $titleData)--}}
{{--                    <option {{ isset($menuItem) && $menuItem->status === 1 ? 'selected' : '' }} value="{{ $id }}">--}}
{{--                        {{ json_decode($titleData, true)['text'] }}--}}
{{--                    </option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
    </div>
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



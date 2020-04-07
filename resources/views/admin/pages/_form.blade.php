<form method="POST"
      action="{{ isset($page) ? route('admin-pages.update', $page->getSlug()) : route('admin-pages.store') }}"
>
    @csrf
    @if(isset($page)) @method('PATCH') @endif
    <div class="row">
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.status') }}</label>
            <select class="form-control text-capitalize" name="status" id="admin-form-locale-status">
                <option>{{ phrase('labels.choose_status') }}</option>
                <option {{ isset($page) && $page->status === 1 ? 'selected' : '' }} value="1">
                    {{ phrase('labels.active') }}
                </option>
                <option {{ isset($page) && $page->status === 0 ? 'selected' : '' }} value="0">
                    {{ phrase('labels.inactive') }}
                </option>
            </select>
        </div>
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.url') }}</label>
            <input type="text"
                   name="url"
                   value="{{ isset($page) ? old('url', $page->url) : '' }}"
                   id="admin-form-page-url"
                   class="form-control"
            >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.col_width') }}</label>
            <input type="number"
                   name="col_width"
                   value="{{ isset($page) ? old('col_width', $page->col_width) : '' }}"
                   id="admin-form-page-col_width"
                   class="form-control"
            >
        </div>
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.classes') }}</label>
            <input type="text"
                   name="classes"
                   value="{{ isset($page) ? old('classes', $page->classes) : '' }}"
                   id="admin-form-page-classes"
                   class="form-control"
            >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.inner_row_classes') }}</label>
            <input type="text"
                   name="inner_row_classes"
                   value="{{ isset($page) ? old('inner_row_classes', $page->inner_row_classes) : '' }}"
                   id="admin-form-page-inner_row_classes"
                   class="form-control"
            >
        </div>
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.outer_row_classes') }}</label>
            <input type="text"
                   name="outer_row_classes"
                   value="{{ isset($page) ? old('outer_row_classes', $page->outer_row_classes) : '' }}"
                   id="admin-form-page-outer_row_classes"
                   class="form-control"
            >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.title') }}</label>
            <input type="text"
                   name="title"
                   value="{{ isset($page) ? old('title', $page->title) : '' }}"
                   id="admin-form-page-title"
                   class="form-control"
            >
        </div>
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.description') }}</label>
            <input type="text"
                   name="description"
                   value="{{ isset($page) ? old('description', $page->description) : '' }}"
                   id="admin-form-page-description"
                   class="form-control"
            >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.styles') }}</label>
            <json-input json_data="{{ isset($page) ? $page->styles : $defaultJsonFieldsData['styles'] }}"
                        input_name="styles"
                        :level="1"
            ></json-input>
        </div>
        <div class="form-group col-6">
            <label class="text-uppercase">{{ phrase('labels.meta_tags') }}</label>
            <json-input json_data="{{ isset($page) ? $page->meta_tags : $defaultJsonFieldsData['meta_tags'] }}"
                        input_name="meta_tags"
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

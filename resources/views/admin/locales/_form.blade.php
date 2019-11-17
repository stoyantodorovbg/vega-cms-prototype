<form method="POST"
      action="{{ isset($locale) ? route('admin-locales.update', $locale->getSlug()) : route('admin-locales.create') }}"
>
    @csrf
    @if(isset($locale))
        @method('PATCH')
    @endif
    <div class="row">
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.language') }}</label>
            <input type="text"
                   name="language"
                   value="{{ isset($locale) ? old('language', $locale->language) : '' }}"
                   id="admin-form-locale-language"
                   class="form-control"
            >
        </div>
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.code') }}</label>
            <input type="text"
                   name="code"
                   value="{{ isset($locale) ? old('code', $locale->code) : '' }}"
                   id="admin-form-locale-code"
                   class="form-control"
            >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.status') }}</label>
            <select class="form-control text-capitalize" name="status" id="admin-form-locale-status">
                <option>{{ phrase('labels.choose_status') }}</option>
                <option {{ isset($locale) && $locale->status === 1 ? 'selected' : '' }} value="1">
                    {{ phrase('labels.active') }}
                </option>
                <option {{ isset($locale) && $locale->status === 0 ? 'selected' : '' }} value="0">
                    {{ phrase('labels.inactive') }}
                </option>
            </select>
        </div>
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.add_to_url') }}</label>
            <input type="text"
                   name="add_to_url"
                   value="{{ isset($locale) ? old('add_to_url', $locale->add_to_url) : '' }}"
                   id="admin-form-locale-add_to_url"
                   class="form-control"
            >
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

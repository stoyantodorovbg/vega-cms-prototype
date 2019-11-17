<form method="POST"
      action="{{ isset($locale) ? route('admin-locales.create') : route('admin-locales.update', $locale->getSlug()) }}"
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
            <input type="text"
                   name="status"
                   value="{{ isset($locale) ? old('language', $locale->status) : '' }}"
                   id="admin-form-locale-status"
                   class="form-control"
            >
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

<form method="POST"
      action="{{ isset($phrase) ? route('admin-phrases.create') : route('admin-phrases.update', $phrase->getSlug()) }}"
>
    @csrf
    @if(isset($phrase))
        @method('PATCH')
    @endif
    <div class="row">
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.system_name') }}</label>
            <input type="text"
                   name="system_name"
                   value="{{ isset($phrase) ? old('system_name', $phrase->system_name) : '' }}"
                   id="admin-form-phrase-system_name"
                   class="form-control"
            >
        </div>
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.text') }}</label>
            <input type="text"
                   name="text"
                   value="{{ isset($phrase) ? old('text', $phrase->text) : '' }}"
                   id="admin-form-phrase-text"
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

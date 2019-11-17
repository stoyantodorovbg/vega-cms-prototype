<form method="POST"
      action="{{ isset($group) ? route('admin-groups.create') : route('admin-groups.update', $group->getSlug()) }}"
>
    @csrf
    @if(isset($group))
        @method('PATCH')
    @endif
    <div class="row">
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.title') }}</label>
            <input type="text"
                   name="title"
                   value="{{ isset($group) ? old('title', $group->title) : '' }}"
                   id="admin-form-group-title"
                   class="form-control"
            >
        </div>
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.description') }}</label>
            <input type="text"
                   name="description"
                   value="{{ isset($group) ? old('title', $group->description) : '' }}"
                   id="admin-form-group-description"
                   class="form-control"
            >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.status') }}</label>
            <input type="text"
                   name="status"
                   value="{{ isset($group) ? old('language', $group->status) : '' }}"
                   id="admin-form-group-status"
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

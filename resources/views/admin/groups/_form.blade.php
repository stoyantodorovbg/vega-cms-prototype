<form method="POST"
      action="{{ isset($group) ? route('admin-groups.update', $group->getSlug()) : route('admin-groups.create') }}"
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
            <label class="text-capitalize">{{ phrase('labels.status') }}</label>
            <select class="form-control text-capitalize" name="status" id="admin-form-group-status">
                <option>{{ phrase('labels.choose_status') }}</option>
                <option {{ isset($group) && $group->status === 1 ? 'selected' : '' }} value="1">
                    {{ phrase('labels.active') }}
                </option>
                <option {{ isset($group) && $group->status === 0 ? 'selected' : '' }} value="0">
                    {{ phrase('labels.inactive') }}
                </option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.description') }}</label>
            <textarea name="description" id="admin-form-group-description" class="form-control">
                {{ isset($group) ? old('title', $group->description) : '' }}
            </textarea>
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

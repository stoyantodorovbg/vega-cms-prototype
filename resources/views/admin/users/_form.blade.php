<form method="POST"
      action="{{ isset($user) ? route('admin-users.update', $user->getSlug()) : route('admin-users.create') }}"
>
    @csrf
    @if(isset($user))
        @method('PATCH')
    @endif
    <div class="row">
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.name') }}</label>
            <input type="text"
                   name="name"
                   value="{{ isset($user) ? old('name', $user->name) : '' }}"
                   id="admin-form-user-name"
                   class="form-control"
            >
        </div>
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.email') }}</label>
            <input type="email"
                   name="email"
                   value="{{ isset($user) ? old('email', $user->email) : '' }}"
                   id="admin-form-user-email"
                   class="form-control"
            >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.password') }}</label>
            <input type="password"
                   name="password"
                   id="admin-form-user-action"
                   class="form-control"
            >
        </div>
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.confirm_password') }}</label>
            <input type="password"
                   name="confirm_password"
                   id="admin-form-user-confirm_password"
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

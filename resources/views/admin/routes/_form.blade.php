<form method="POST"
      action="{{ isset($route) ? route('admin-routes.update', $route->getSlug()) : route('admin-routes.create') }}"
>
    @csrf
    @if(isset($route))
        @method('PATCH')
    @endif
    <div class="row">
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.url') }}</label>
            <input type="text"
                   name="url"
                   value="{{ isset($route) ? old('url', $route->url) : '' }}"
                   id="admin-form-route-url"
                   class="form-control"
            >
        </div>
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.method') }}</label>
            <input type="text"
                   name="method"
                   value="{{ isset($route) ? old('method', $route->method) : '' }}"
                   id="admin-form-route-method"
                   class="form-control"
            >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.action') }}</label>
            <input type="text"
                   name="url"
                   value="{{ isset($route) ? old('action', $route->action) : '' }}"
                   id="admin-form-route-action"
                   class="form-control"
            >
        </div>
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.name') }}</label>
            <input type="text"
                   name="method"
                   value="{{ isset($route) ? old('name', $route->name) : '' }}"
                   id="admin-form-route-name"
                   class="form-control"
            >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.route_type') }}</label>
            <input type="text"
                   name="url"
                   value="{{ isset($route) ? old('route_type', $route->route_type) : '' }}"
                   id="admin-form-route-route_type"
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

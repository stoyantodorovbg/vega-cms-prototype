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
            <select class="form-control text-capitalize" name="route_type" id="admin-form-locale-route_type">
                <option value="">{{ phrase('labels.choose_route_type') }}</option>
                <option value="web">web</option>
                <option value="admin">admin</option>
                <option value="page">page</option>
                <option value="api">api</option>
            </select>
        </div>
        <div class="form-group col-6">
            <label class="text-capitalize">{{ phrase('labels.action_type') }}</label>
            <select class="form-control text-capitalize" name="route_type" id="admin-form-locale-action_type">
                <option value="">{{ phrase('labels.choose_action_type') }}</option>
                <option value="front">front</option>
                <option value="admin">admin</option>
                <option value="api">api</option>
            </select>
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

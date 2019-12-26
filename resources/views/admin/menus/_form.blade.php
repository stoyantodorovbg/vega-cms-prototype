<form method="POST"
      action="{{ isset($menu) ? route('admin-menus.update', $menu->getSlug()) : route('admin-menus.create') }}"
>
    @csrf
    @if(isset($menu))
        @method('PATCH')
    @endif
    <div class="row">

    </div>
    <div class="row">

    </div>
    <div class="row">
        <div class="form-group col-12">

            <button type="submit" class="btn btn-primary float-right text-uppercase pl-5 pr-5">
                {{ phrase('buttons.submit') }}
            </button>
        </div>

    </div>
</form>

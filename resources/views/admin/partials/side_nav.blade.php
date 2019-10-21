<div class="admin-side-nav d-inline-flex p-3 pl-4 col-2">
    <ul class="list-unstyled p-2">
        <li class="mb-2 mt-2 text-uppercase">
            <a class="text-dark" href="#">Dashboard</a>
        </li>
        <li class="mb-2 mt-2 text-uppercase">
            <a class="text-dark" href="{{ route('admin-users.index') }}">Users</a>
        </li>
        <li class="mb-2 mt-2 text-uppercase">
            <a class="text-dark" href="{{ route('admin-groups.index') }}">User Groups</a>
        </li>
        <li class="mb-2 mt-2 text-uppercase">
            <a class="text-dark"href="{{ route('admin-phrases.index') }}">Phrases</a>
        </li>
        <li class="mb-2 mt-2 text-uppercase">
            <a class="text-dark" href="{{ route('admin-locales.index') }}">Locales</a>
        </li>
        <li class="mb-2 mt-2 text-uppercase">
            <a class="text-dark" href="{{ route('admin-routes.index') }}">Routes</a>
        </li>
    </ul>
</div>

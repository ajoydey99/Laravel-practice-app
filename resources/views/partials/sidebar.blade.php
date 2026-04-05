@php
    $homeRouteIsActive = request()->routeIs('home');
    $createRouteIsActive = request()->routeIs('customers.create');
    $editRouteIsActive = request()->routeIs('customers.edit');
    $showRouteIsActive = request()->routeIs('customers.show');
@endphp



<div class="sidebar">
    <h4 class="text-center py-3 border-bottom text-white d-flex align-items-center justify-content-center gap-2">
        <i class="bi bi-grid-1x2-fill"></i>
        <span>My Panel</span>
    </h4>

    <a href="{{ route('home') }}" @class(['active' => $homeRouteIsActive])>
        <i class="bi bi-speedometer2 me-2"></i>
        Dashboard
    </a>

    <a href="{{ route('customers.create') }}" @class(['active' => $createRouteIsActive])>
        <i class="bi bi-plus-circle me-2"></i>
        Create
    </a>

    <a href="#" @class([
        'd-none' => !$editRouteIsActive,
        'active' => $editRouteIsActive,
    ])>
        <i class="bi bi-pencil-square me-2"></i>
        Update
    </a>

    <a href="#">
        <i class="bi bi-trash me-2"></i>
        Delete
    </a>

    <a href="#" @class([
        'd-none' => !$showRouteIsActive,
        'active' => $showRouteIsActive,
    ])>
        <i class="bi bi-person-circle me-2"></i>
        Profile
    </a>

</div>

@include('admin.header')

@include('admin.sidenav')

<div class="content">
    @include('admin.nav')

    <div class="container-fluid pt-2 px-3">
        <div class="row vh-100 bg-secondary rounded ">
            @yield('content')
        </div>
    </div>
</div>

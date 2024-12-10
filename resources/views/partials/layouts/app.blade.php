@include('partials.components.dashboard.header')
<body>
    <div class="wrapper">
        @include('partials.components.dashboard.sidebar')
        <div class="main-panel">
            @include('partials.components.dashboard.navbar')
            <div class="container">
                <div class="page-inner">
                    @yield('content')
                </div>
            </div>
            @include('partials.components.dashboard.footer')
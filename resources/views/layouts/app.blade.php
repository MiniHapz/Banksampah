@include('layouts.header')

<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('layouts.navbar')

            <div id="sidebar-wrapper" class="main-sidebar">
    @include('layouts.sidebar')
</div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>{{ $section_header ?? '' }}</h1>
                    </div>
                    @yield('content')
                </section>
            </div>
            @include('layouts.footer')

            @stack('scripts')

</body>
</html>
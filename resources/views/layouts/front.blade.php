<!doctype html>
<html class="no-js" lang="en">
    @include('website.partials.head')
    <body>
        <div class="locked" style="display: none"><img src="{{ asset('assets/images/3C-musi-side.jpg') }}" alt="" data-no-retina=""></div>
        <!-- start header -->
        @include('website.partials.header')

            @yield('content')

        @include('website.partials.footer')
</body>
</html>
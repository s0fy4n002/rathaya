    <script src="/th/be/js/vendor/jquery-3.5.1.min.js"></script>{{-- Vendor Scripts START --}}
    <script src="/th/be/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/th/be/js/vendor/OverlayScrollbars.min.js"></script>
    <script src="/th/be/js/vendor/autoComplete.min.js"></script>
    <script src="/th/be/js/vendor/clamp.min.js"></script>

    <script src="/th/be/icon/acorn-icons.js"></script>
    <script src="/th/be/icon/acorn-icons-interface.js"></script>
    @yield('js_vendor') {{-- Vendor Scripts END --}}
    
    {{-- Template Base Scripts START --}}
    <script src="/th/be/js/base/helpers.js"></script>
    <script src="/th/be/js/base/globals.js"></script>
    <script src="/th/be/js/base/nav.js"></script>
    <script src="/th/be/js/base/search.js"></script>
    <script src="/th/be/js/base/settings.js"></script>
    {{-- Template Base Scripts END --}}

    {{-- Page Specific Scripts START --}}
    <script src="/th/be/js/common.js"></script>
    <script src="/th/be/js/scripts.js"></script>
    @yield('js_page')
    {{-- Page Specific Scripts END --}}
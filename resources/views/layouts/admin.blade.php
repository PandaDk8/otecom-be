<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180"
          href="{{ asset('admin/DeskApp/vendors/images/apple-touch-icon.png') }}"/>
    <link rel="icon" type="image/png" sizes="32x32"
          href="{{ asset('admin/DeskApp/vendors/images/favicon-32x32.png') }}"/>
    <link rel="icon" type="image/png" sizes="16x16"
          href="{{ asset('admin/DeskApp/vendors/images/favicon-16x16.png') }}"/>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet"/>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/DeskApp/vendors/styles/core.css') }} "/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/DeskApp/vendors/styles/icon-font.min.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('admin/DeskApp/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('admin/DeskApp/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/DeskApp/vendors/styles/style.css') }}"/>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag("js", new Date());

        gtag("config", "G-GBZ3SGGX85");
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                "gtm.start": new Date().getTime(),
                event: "gtm.js"
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->
    @yield('head')
    @livewireStyles
</head>
<body>
@include('layouts.inc.admin.navbar')
@include('layouts.inc.admin.sidebar')
<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        @yield('content')
    </div>
</div>

<!-- js -->
<script src="{{ asset('admin/DeskApp/vendors/scripts/core.js') }}"></script>
<script src="{{ asset('admin/DeskApp/vendors/scripts/script.min.js') }}"></script>
<script src="{{ asset('admin/DeskApp/vendors/scripts/process.js') }}"></script>
<script src="{{ asset('admin/DeskApp/vendors/scripts/layout-settings.js') }}"></script>
<script src="{{ asset('admin/DeskApp/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/DeskApp/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/DeskApp/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/DeskApp/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/DeskApp/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/DeskApp/vendors/scripts/dashboard3.js') }}"></script>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
            style="display: none; visibility: hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
@livewireScripts
@stack('script')
@yield('script')
</body>

</html>

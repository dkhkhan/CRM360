@include('includes/header')
@include('includes/sidebar')
    <main class="main mainheight">
        @yield('page_title')
        @yield('content')
    </main>
    <footer class="footer text-white mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md col-lg py-2">
                    <span class="text-secondary small">Copyright @2022, CRM360 Developed by <a href="https://eaglehills.com/" target="_blank">Eaglehills</a> Digital Team</span>
                </div>
            </div>
        </div>
    </footer>
@include('includes/rightbar')
{{-- @include('includes/chat') --}}
@include('includes/footer')
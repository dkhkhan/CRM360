<!-- Required jquery and libraries -->
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-5/dist/js/bootstrap.bundle.js') }}"></script>

    <!-- Customized jquery file  -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/color-scheme.js') }}"></script>

    <!-- PWA app service registration and works -->
    <!-- <script src="{{ asset('assets/js/pwa-services.js') }}"></script> -->

    <!-- date range picker -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="{{ asset('assets/vendor/daterangepicker/daterangepicker.js') }}"></script>

    <!-- chosen script -->
    <!-- <script src="{{ asset('assets/vendor/chosen_v1.8.7/chosen.jquery.min.js') }}"></script> -->

    <!-- Chart js script -->
    <script src="{{ asset('assets/vendor/chart-js-3.3.1/chart.min.js') }}"></script>

    <!-- Progress circle js script -->
    <script src="{{ asset('assets/vendor/progressbar-js/progressbar.min.js') }}"></script>

    <!-- swiper js script -->
    <!-- <script src="{{ asset('assets/vendor/swiper-7.3.1/swiper-bundle.min.js') }}"></script> -->

    <!-- Simple lightbox script -->
    <!-- <script src="{{ asset('assets/vendor/simplelightbox/simple-lightbox.jquery.min.js') }}"></script> -->

    <!-- app tour script-->
    <!-- <script src="{{ asset('assets/vendor/Product-Tour-Plugin-jQuery/lib.js') }}"></script> -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- Footable table master script-->
    <script src="{{ asset('assets/vendor/fooTable/js/footable.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/finance-dashboard.js') }}"></script> -->
    <!-- page level script here -->
    <script src="{{ asset('assets/js/header-title.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script type="text/javascript">
    $(function(){
        $('a.user_logout').on('click',function(e){
            event.preventDefault();
           $('form#logout_form').submit();
        });

        $('#checkall').change(function(){
                if($(this).is(':checked')){
                    $(this).parents('div.checkall').find('input[type="checkbox"]').attr('checked',true);
                }else{
                    $(this).parents('div.checkall').find('input[type="checkbox"]').attr('checked',false);
                }
            });
    });
</script>
@yield('scripts')
</body>

</html>
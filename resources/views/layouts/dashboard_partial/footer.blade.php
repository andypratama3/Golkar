 <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets_dashboard/x/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets_dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets_dashboard/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('assets_dashboard/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets_dashboard/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets_dashboard/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets_dashboard/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets_dashboard/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets_dashboard/jquery/jquery.js') }}"></script>


  <!-- Template Main JS File -->
  <script src="{{ asset('assets_dashboard/js/main.js') }}"></script>
  <script src="{{ asset('assets_dashboard/vendor/SwetAlert/index.js') }}"></script>
  @stack('js')
  <script>

    $(document).ready(function () {
        $(".delete").click(function (e) {
            slug = e.target.dataset.id;
            swal({
                    title: 'Anda yakin?',
                    text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(`#delete-${slug}`).submit();
                    } else {
                        // Do Nothing
                    }
                });
        });
    });
</script>

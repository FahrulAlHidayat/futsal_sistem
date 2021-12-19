
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p>
    </div>
  </footer>

  <script src="<?php echo base_url(); ?>assets/theme/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/theme/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript">
  $(document).ready(function () {
    $('#datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        startDate: "today",
        todayBtn: "linked"
    });
  });
  </script>
</body>
</html>

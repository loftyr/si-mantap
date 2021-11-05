<!-- jQuery -->
<script src="<?= base_url('include/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('include/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Select2 -->
<script src="<?= base_url('include/plugins/select2/js/select2.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('include/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<!-- <script src="<?= base_url('include/plugins/chart.js/Chart.min.js') ?>"></script> -->
<!-- Sparkline -->
<!-- <script src="<?= base_url('include/plugins/sparklines/sparkline.js') ?>"></script> -->
<!-- JQVMap -->
<!-- <script src="<?= base_url('include/plugins/jqvmap/jquery.vmap.min.js') ?>"></script> -->
<!-- <script src="<?= base_url('include/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="<?= base_url('include/plugins/jquery-knob/jquery.knob.min.js') ?>"></script> -->
<!-- DataTables -->
<script src="<?= base_url('include/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('include/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('include/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('include/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('include/plugins/datatables-fixedcolumns/js/dataTables.fixedColumns.min.js') ?>"></script>
<script src="<?= base_url('include/plugins/datatables-fixedcolumns/js/fixedColumns.bootstrap4.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('include/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('include/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('include/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<!-- <script src="<?= base_url('include/plugins/summernote/summernote-bs4.min.js') ?>"></script> -->
<!-- overlayScrollbars -->
<script src="<?= base_url('include/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('include/admin_lte/js/adminlte.js') ?>"></script>
<!-- Jquery Mask -->
<script src="<?= base_url('include/jquery.mask.min.js') ?>"></script>

<!-- Bootstrap Switch -->
<script src="<?= base_url('include/plugins/bootstrap-switch/js/bootstrap-switch.min.js') ?>"></script>
<!-- <script src="<?= base_url('include/switch/bootstrap4-toggle.min.js') ?>"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?= base_url('include/admin_lte/js/pages/dashboard.js') ?>"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?= base_url('include/admin_lte/js/demo.js') ?>"></script> -->
<!-- CKeditor -->
<script src="<?= base_url('include/ckeditor/ckeditor.js') ?>"></script>
<script src="<?= base_url('include/setckeditor.js') ?>"></script>

<!-- SweetAlert 2 -->
<script src="<?= base_url('include/sweetalert2/sweetalert2.all.min.js') ?>"></script>
<!-- Pace-Progress -->
<script src="<?= base_url("include/plugins/pace-progress/pace.min.js") ?>"></script>

<!-- Custom JavaScript -->
<script src="<?= base_url('include/js/s_base.js') ?>"></script>
<?php if (@$Js != "") : ?>
    <script src="<?= base_url('include/js/admin/' . @$Js) ?>"></script>
<?php endif; ?>
</body>

</html>
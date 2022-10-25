                        <!-- Footer -->
                        <footer class="content-footer footer bg-footer-theme">
                            <div
                                class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                                <div class="mb-2 mb-md-0">
                                    © SIRADE
                                    <script> document.write(new Date().getFullYear())</script>
                                    , hecho por <a href="#" target="_blank"
                                        class="footer-link fw-bolder">Codacod</a>
                                </div>                            
                            </div>
                        </footer>
                        <!-- / Footer -->
                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>
            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>
        </div>
        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="../assets/vendor/libs/jquery/jquery.js"></script>
        <script src="../assets/vendor/libs/popper/popper.js"></script>
        <script src="../assets/vendor/js/bootstrap.js"></script>
        <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../assets/vendor/libs/hammer/hammer.js"></script>
        <script src="../assets/vendor/libs/i18n/i18n.js"></script>
        <script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>
        <script src="../assets/vendor/js/menu.js"></script>
        <script src="../assets/vendor/libs/moment/moment.js"></script>
        <!-- endbuild -->
        <!-- Vendors JS -->
        <?php 
            switch ($file) {
                case 'Registros Llamada' || 'Registros Usuarios':
                    ?>
            <script src="../assets/vendor/libs/datatables/jquery.dataTables.js"></script>
            <script src="../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
            <script src="../assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>                
            <script src="../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
            <script src="../assets/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
            <script src="../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
            <script src="../assets/vendor/libs/jszip/jszip.js"></script>
            <script src="../assets/vendor/libs/pdfmake/pdfmake.js"></script>
            <script src="../assets/vendor/libs/datatables-buttons/buttons.html5.js"></script>
            <script src="../assets/vendor/libs/datatables-buttons/buttons.print.js"></script>
            <script src="../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
            <script src="../assets/vendor/libs/cleavejs/cleave.js"></script>
            <script src="../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
            <script src="../assets/vendor/libs/select2/select2.js"></script>
            <script src="../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
            <script src="../assets/vendor/libs/formvalidation/dist/js/plugins/Transformer.min.js"></script>
            <script src="../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
            <script src="../assets/vendor/libs/flatpickr/flatpickr.js"></script>
            <script src="../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
            <script src="../assets/vendor/libs/moment/moment.js"></script>
            <script src="../assets/vendor/libs/datetime/datetime.js"></script>
                    <?php
                    break;
                default:
                    ?>
        <script src="../assets/vendor/libs/select2/select2.js"></script>
        <script src="../assets/vendor/libs/tagify/tagify.js"></script>
        <script src="../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>                    
        <script src="../assets/vendor/libs/flatpickr/flatpickr.js"></script>
        <script src="../assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
        <script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>
        <script src="../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
        <script src="../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
        <script src="../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
        <script src="../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
                    <?php
                    break;
            }
        ?>                
        <!-- Main JS -->
        <script src="../assets/js/main.js"></script>
        <!-- Page JS -->        
        <script src="assets/js/<?php echo (basename($_SERVER['PHP_SELF'], '.php')); ?>.js"></script>
    </body>
</html>
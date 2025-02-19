import './bootstrap';

import '@plugins/jquery-ui/jquery-ui.min.js';
import '@plugins/bootstrap/js/bootstrap.bundle.min.js';
import '@plugins/chart.js/Chart.min.js';
import '@plugins/sparklines/sparkline.js';
import '@plugins/jqvmap/jquery.vmap.min.js';
import '@plugins/jqvmap/maps/jquery.vmap.usa.js';
import '@plugins/jquery-knob/jquery.knob.min.js';
import '@plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js';
import '@plugins/summernote/summernote-bs4.min.js';
import '@plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js';
import '@dist/js/adminlte.js';
import '@dist/js/custom.js';

// Resolve conflict in jQuery UI tooltip with Bootstrap tooltip
$.widget.bridge('uibutton', $.ui.button);

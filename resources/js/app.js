// jquery
import $ from 'jquery/dist/jquery';
window.$ = window.jQuery = $;

// select2
import select2 from 'select2';
select2();

// sweetalert2
import swal from 'sweetalert2';
window.swal = swal;

// moment
import moment from 'moment';
window.moment = moment;

// datatables
import DataTable from 'datatables.net';
import 'datatables.net-bs5';
import 'datatables.net-responsive-bs5';
import 'datatables.net-fixedheader-bs5';
import 'datatables.net-colreorder-bs5';
import 'datatables.net-autofill-bs5'
window.DataTable = DataTable;

// Chart.js
import Chart from 'chart.js/auto';
window.Chart = Chart;

// @fullcalendar
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
window.Calendar = Calendar;
window.dayGridPlugin = dayGridPlugin;
window.timeGridPlugin = timeGridPlugin;
window.listPlugin = listPlugin;

// Added: Actual Bootstrap JavaScript dependency
import 'bootstrap';

// Added: Popper.js dependency for popover support in Bootstrap
import '@popperjs/core';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();







// Default Laravel bootstrapper, installs axios
import './bootstrap';

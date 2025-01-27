<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

	<!-- Styles / Scripts -->
	@vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])

</head>
<body class=" ">

	<div class="container-fluid row justify-content-center mx-auto min-vh-100 border border-primary">

		<div class="col-sm-8 row justify-content-center align-items-center m-2 border border-success">
			<h1 class="text-center animate__animated animate__bounce">An animated element</h1>
		</div>

		<div class="col-sm-8 row justify-content-center align-items-center m-2 border border-success">
			<div class="row col-sm-6 border border-primary">
				<label for="select2" class="col-form-label col-sm-4">Test Select 2:</label>
				<div class="col-sm-8">
					<select name="select2" id="select2" class="form-select form-select-sm col-sm-8" placeholder="Please choose">
						<option value="">Please choose</option>
						<option value="1">Pick 1</option>
						<option value="2">Pick 2</option>
					</select>
				</div>
			</div>
		</div>

		<div class="col-sm-8 row justify-content-center align-items-center m-2 border border-success">
			<div class="row col-sm-6 border border-primary">
				<label for="dp" class="col-form-label col-sm-4">jQuery-ui Datepicker:</label>
				<div class="col-sm-8">
					<input type="text" id="dp" name="datepicker" class="form-control form-control-sm">
				</div>
			</div>
		</div>

		<div class="col-sm-8 row justify-content-center align-items-center m-2 border border-success">
			<div class="col-sm-4">
				<button id="button1" class="m-1 btn btn-primary"><i class="fa-regular fa-user fa-beat"></i> Primary button</button>
				<button id="button2" class="m-1 btn btn-secondary"><i class="fa-solid fa-bomb fa-beat"></i> secondary button</button>
				<button id="button3" class="m-1 btn btn-outline-primary"><i class="bi bi-airplane-engines"></i> third button</button>
				<button id="button4" class="m-1 btn btn-outline-primary"><span class="mdi mdi-ab-testing"></span> fourth button</button>
			</div>
		</div>

		<div class="col-sm-8 row justify-content-center align-items-center m-2 border border-success">
			<table id="table_id" class="table table-sm table-hover">
				<thead>
					<tr>
						<th>Column 1</th>
						<th>Column 2</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Row 1 Data 1</td>
						<td>Row 1 Data 2</td>
					</tr>
					<tr>
						<td>Row 2 Data 1</td>
						<td>Row 2 Data 2</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col-sm-8 row justify-content-center align-items-center m-2 border border-success">
			<canvas id="myChart"></canvas>
		</div>

		<div class="col-sm-8 row justify-content-center align-items-center m-2 border border-success">
			<div id="calendar"></div>
		</div>

		<footer class="py-5 text-center text-sm text-black dark:text-white/70 mx-auto align-self-end border border-primary">
			Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
		</footer>

	</div>
</body>
<script type="module">
	jQuery.noConflict ();
	(function($){
		$(document).ready(function(){

			$('#button1').click(function(){
				alert("Thanks");
			});

			$('#button2').click(function(){
				swal.fire('Title', 'message', 'info');
			});

			console.log('test');

			$('#select2').select2();

			console.log(moment().format('D MMMM YYYY'));

			$("#dp").datepicker();

			$('#table_id').DataTable();


			const ctx = document.getElementById('myChart');
			new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
					datasets: [{
						label: '# of Votes',
						data: [12, 19, 3, 5, 2, 3],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					}
				}
			});

			let calendarEl = document.getElementById('calendar');
			let calendar = new Calendar(calendarEl, {
				plugins: [
					multiMonthPlugin,
					dayGridPlugin,
					timeGridPlugin,
					listPlugin,
					momentPlugin,
					bootstrap5Plugin,
				],
				titleFormat: 'D MMMM, YYYY',  // momentPlugin
				themeSystem: 'bootstrap5',   // bootstrap5Plugin
				initialView: 'multiMonthYear',
				headerToolbar: {
					left: 'prev,next today',
					center: 'title',
					right: 'multiMonthYear,dayGridMonth,timeGridWeek'
				},

				events: [
					{
						title: 'Event 1',
						start: '{{ now() }}', // Date of the event
						description: 'Description of Event 1'
					},
					{
						title: 'Event 2',
						start: '{{ now()->subdays(2) }}', // Date and time
						end: '{{ now()->subday() }}', // Optional end time
						description: 'Description of Event 2'
					},
					{
						title: 'Event 3',
						start: '{{ now()->subdays(6) }}',
						description: 'Description of Event 3'
					}
				],
				eventClick: function(info) {
					// alert(info.event.title + "\n" + info.event.extendedProps.description);
					swal.fire({
						title: info.event.title,
						text: info.event.extendedProps.description,
						icon: 'info',
					});
				},
				eventDidMount: function(info) {
					$(info.el).tooltip({
						title: info.event.extendedProps.description,
						placement: 'top',
						trigger: 'hover',
						container: 'body'
					});
				},
				eventTimeFormat: { // like '14:30:00'
					hour: '2-digit',
					minute: '2-digit',
					second: '2-digit',
					hour12: true
				},

			});
			calendar.render();






		});
	})(jQuery);
</script>
</html>

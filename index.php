<?
?>

<html>
	<head>
	<script type="text/javascript" src="lib/jquery-1.11.2.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$('#latency').keyup(function(){
		calculate();
	});

	$('#window_size').keyup(function(){
		calculate();		
	});

	function calculate(){
		var latency = $('#latency').val();
		var window_size = $('#window_size').val();

		// Convert window_size to bits
		var window_size_bits = window_size * 1024 * 8;

		// Convert latency to sec
		var latency_sec = latency / 1000;

		// Calculate
		var results = window_size_bits / latency_sec;
		var results_mbit = results / 1000 / 1000;
		var results_mbyte = (results_mbit / 8)
		var results_mbyte_round = Math.round(results_mbyte*10)/10;
		var results_mbit_round = Math.round(results_mbit*10)/10;

		$('div#results').html("<p>Results:</p> <p>"+results_mbyte_round+" MB/s</p> <p>"+results_mbit_round+" mb/s</p>");
	}
});
</script>

	</head>

	<body>

		<p>Enter latency in millisecond and window size in kilobytes. Returns throughput.</p>
		<form>
		<table>
			<tr>
				<th>Latency</th>
				<td><input type="text" name="latency" id="latency"> (ms)</td>
			</tr>
			<tr>
				<th>Window size (KB)</th>
				<td><input type="text" name="window_size" id="window_size" value="64"> (Default 64 KB)</td>
			</tr>
		</table>
		</form>

		<div id="results">
		</div>
	</body>
</html>

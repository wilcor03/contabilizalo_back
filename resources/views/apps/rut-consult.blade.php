<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<table style="display:none;">
		@foreach($results as $result)
		<tr>
			<td>{{ $result['firstName'] }}</td>
			<td>{{ $result['otherNames'] }}</td>
			<td>{{ $result['firstLastName'] }}</td>
			<td>{{ $result['secondLastName'] }}</td>
			<td>{{ $result['state'] }}</td>
			<td>{{ $result['socialReason'] }}</td>
		</tr>
		@endforeach
	</table>
</body>
</html>
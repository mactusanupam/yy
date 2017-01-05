<style type="text/css">

	table td, table th{

		border:1px solid black;
		background-color:  #ccffff;


</style>

<div class="container">


	<br/>
	<a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>
<?php //echo "<a href=\" route('pdfview',['download'=>'pdf']) \">Download PDF</a>";
//echo $url; ?>
	
 <?php
    
       $items = DB::table('itemnames')->get();

    ?>
	<table>

		<tr>

			<th>No</th>

			<th>Item</th>

			<th> Total_Quantity</th>

		</tr>

		@foreach ($items as $key => $item)

		<tr>

			<td>{{ ++$key }}</td>

			<td>{{ $item->Item_name }}</td>

			<td>{{ $item->Total_Quantity}}</td>

		</tr>

		@endforeach

	</table>

</div>
<?php
echo"<a href=\"javascript:history.go(-1)\"><h4 style = font-size:120%> Go back to previous page.</h4></a>";
?>


<html>
<head>
<title>
 Download | Upload File
</title>
</head>
<body>
<form action="<?php echo base_url();?>download/upload" method="post" enctype="multipart/form-data">
	<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">

	</form>
<table border="1" cellspacing="0" cellpadding="0" style="width:auto;">

<tr>
	<td>Gambar</td>
	<td>Size</td>
	<td>Date</td>
	<td>Download</td>
</tr>

<?php
$jumrow=$gambar->num_rows();
foreach($gambar->result_array() as $row)
{
?>
<tr>
	<td><?php echo $row['FileName'];?></td>
	<td><?php echo $row['FileSize'];?></td>
	<td><?php echo $row['FileDate'];?></td>
	<td><a href="<?php echo base_url();?>download/downloadgambar/<?php echo $row['FileID'];?>/<?php echo $row['FileName'];?>/<?php echo $row['FileSize'];?>">Download</a></td>
</tr>
<?php
}
?>
</table>
<a href="<?php echo base_url();?>download/downloadall">All</a>
</body>
</htm>
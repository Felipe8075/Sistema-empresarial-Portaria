<?php include_once("CONECT/conexao.php");

$output= array();
$sql = "SELECT * FROM restrito";

$totalQuery = mysqli_query($conexao,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE apartamento like '%".$search_value."%'";
	$sql .= " OR nomebloquado like '%".$search_value."%'";
	$sql .= " OR documentobloqueado like '%".$search_value."%'";
	$sql .= " OR restri1 like '%".$search_value."%'";
	$sql .= " OR restri2 like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$column_name." ".$order."";
}
else
{
	$sql .= " ORDER BY id desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($conexao,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['apartamento'];
	$sub_array[] = $row['nomebloquado'];
	$sub_array[] = $row['documentobloqueado'];
	$sub_array[] = $row['restri1'];
	$sub_array[] = $row['restri2'];
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);

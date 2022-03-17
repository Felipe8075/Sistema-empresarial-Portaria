<?php include_once("CONECT/conexao.php");

$output= array();
$sql = "SELECT * FROM veiculos ";

$totalQuery = mysqli_query($conexao,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE residencia like '%".$search_value."%'";
	$sql .= " OR nomeveiculo like '%".$search_value."%'";
	$sql .= " OR marcaveiculo like '%".$search_value."%'";
	$sql .= " OR cordoveiculo like '%".$search_value."%'";
	$sql .= " OR pladoveiculo like '%".$search_value."%'";
	$sql .= " OR blocomorador like '%".$search_value."%'";
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
	$sub_array[] = $row['residencia'];
	$sub_array[] = $row['nomeveiculo'];
	$sub_array[] = $row['marcaveiculo'];
	$sub_array[] = $row['cordoveiculo'];
	$sub_array[] = $row['pladoveiculo'];
	$sub_array[] = $row['blocomorador'];
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);

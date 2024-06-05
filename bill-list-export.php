<?php
include_once 'dbconfig.php';

function filterData(&$str)
{
    $str = preg_replace("/\t/","\\t",$str);
    $str = preg_replace("/\r?\n/","\\n",$str);
    if(strstr($str,'"')) $str = '"' . str_replace('"','""',$str) . '"'; 
}

$fileName = "Bills Management-data_" . date('Y-m-d') . ".xls";
$fields = array('ID','INVOICE NO','INVOICE DATE','NAME','DESCRIPTION','QUANTITY','UNIT PRICE','SUB-TOTAL','DATE','PAYMENT METHOD','STATUS');
$excelData = implode("\t",array_values($fields)) . "\n";

$query = $connection->query("SELECT * FROM bill_list ORDER BY id ASC");

if($query->num_rows > 0)
{
    while($row = $query->fetch_assoc())
    {
        $lineData = array($row['id'],$row['invoice_no'],$row['invoice_date'],$row['name'],$row['description'],$row['quantity'],$row['unit_price'],$row['subtotal'],$row['date'],$row['payment_method'],$row['status']);
        array_walk($lineData,'filterData');
        $excelData .= implode("\t",array_values($lineData)) . "\n"; 
    }
}
else
{
    $excelData .= "No Records Found" . "\n";
}
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$fileName\"");

echo $excelData;

exit;
?>

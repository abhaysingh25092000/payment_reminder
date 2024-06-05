<?php
include_once 'dbconfig.php';

function filterData(&$str)
{
    $str = preg_replace("/\t/","\\t",$str);
    $str = preg_replace("/\r?\n/","\\n",$str);
    if(strstr($str,'"')) $str = '"' . str_replace('"','""',$str) . '"'; 
}

$fileName = "sales-data_" . date('Y-m-d') . ".xls";
$fields = array('ID','CUSTOMER NAME','PRODUCT NAME','QUANTITY','ISSUE DATE','LAST DATE','PRICE','TAX AMOUNT','DATE OF SUBMISSION');
$excelData = implode("\t",array_values($fields)) . "\n";

$query = $connection->query("SELECT * FROM sales ORDER BY id ASC");

if($query->num_rows > 0)
{
    while($row = $query->fetch_assoc())
    {
        $lineData = array($row['id'],$row['customer_name'],$row['product_name'],$row['quantity'],$row['issue_date'],$row['last_date'],$row['price'],$row['tax_amount'],$row['submission_date']);
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

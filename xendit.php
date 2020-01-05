<?php 

$success=false;


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $file = 'text.txt';

    $data = file_get_contents("php://input");

    // $current2 = file_get_contents($file);
    
    $current2 = $data;
    if(file_put_contents($file,$current2)){
        $success = true;
    }
    
    print_r("\n\n$data contains the updated invoice data \n\n");
    print_r($data);
    print_r("\n\nUpdate your database with the invoice status \n\n");
} else {
    print_r("Cannot ".$_SERVER["REQUEST_METHOD"]." ".$_SERVER["SCRIPT_NAME"]);
}

// $file = 'text.txt';
// // Open the file to get existing content
// $current = file_get_contents($file);
// // Append a new person to the file
// $current .= "John Smith\n";
// // Write the contents back to the file
// file_put_contents($file, $current);


?>
<?php
$conn = mysqli_connect("localhost", "root", "12345678", "post");

$affectedRow = 0;

$xml = simplexml_load_file("post.xml") or die("Error: Cannot create object");

foreach ($xml->children() as $row) {
    $title0 = $row->Cell[0];
    $title1 = $row->Cell[1];

    
    $sql = "INSERT INTO dvice(
        id,
        dvice_type,
        dvice_name,
        office_name,
        sn
        )
        VALUES
        (
            'pos',
            'نقاط بيع',
            'VERIFONE V200T',
            '" . $title0 . "',
            '" . $title1 . "'
        )";
    
    $result = mysqli_query($conn, $sql);
    
    if (! empty($result)) {
        $affectedRow ++;
    } else {
        $error_message = mysqli_error($conn) . "\n";
    }
}
?>
<h2>Insert XML Data to MySql Table Output</h2>
<?php
if ($affectedRow > 0) {
    $message = $affectedRow . " records inserted";
} else {
    $message = "No records inserted";
}

?>
<style>
body {  
    max-width:550px;
    font-family: Arial;
}
.affected-row {
	background: #cae4ca;
	padding: 10px;
	margin-bottom: 20px;
	border: #bdd6bd 1px solid;
	border-radius: 2px;
    color: #6e716e;
}
.error-message {
    background: #eac0c0;
    padding: 10px;
    margin-bottom: 20px;
    border: #dab2b2 1px solid;
    border-radius: 2px;
    color: #5d5b5b;
}
</style>
<div class="affected-row"><?php  echo $message; ?></div>
<?php if (! empty($error_message)) { ?>
<div class="error-message"><?php echo nl2br($error_message); ?></div>
<?php } ?>
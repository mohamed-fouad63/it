<?php
session_start();
date_default_timezone_set('Africa/Cairo');
$session_id = $_SESSION['id'];
include '../connection.php';
$key = implode(' ', array_slice(explode(' ', $_POST['key']), 0, 4)) ;
$this_date = $_POST['date_missin'];

$date_missin_month = date("m", strtotime($this_date));

$date_missin_year = date("Y", strtotime($this_date));

$misin_date = $date_missin_year . "-" . $date_missin_month;


function getMonth($year, $month)
{
    // this calculates the last day of the given month
    $last = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $date = new DateTime();
    $alldays = array();
    // iterates through days
    for ($day = 1; $day <= $last; $day++) {
        $date->setDate($year, $month, $day);
        $alldays[] = $date->format("Y-m-d");
    }
    return $alldays;
}

$workdays = 0;
$type = CAL_GREGORIAN;

$day_count = cal_days_in_month($type, $date_missin_month, $date_missin_year); // Get the amount of days
//loop through all days
for ($i = 1; $i <= $day_count; $i++) {
    $date = $date_missin_year . '/' . $date_missin_month . '/' . $i; //format date
    $get_name = date('l', strtotime($date)); //get week day
    $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars
    //if not a weekend add day to array
    if ($day_name != 'Sat' && $day_name != 'Fri') {
        $workdays++;
    }
}


$last = cal_days_in_month(CAL_GREGORIAN, $date_missin_month, $date_missin_year);
$alldays = getMonth($date_missin_year, $date_missin_month);
?>

<?php
foreach ($alldays as $daye) {
    $nameOfDay = date('D', strtotime($daye));
    switch ($nameOfDay) {
        case "Fri":
            $nameOfDay = "الجمعه";
            break;
        case "Sat":
            $nameOfDay = "السبت";
            break;
        case "Sun":
            $nameOfDay = "الأحد";
            break;
        case "Mon":
            $nameOfDay = "الأثنين";
            break;
        case "Tue":
            $nameOfDay = "الثلاثاء";
            break;
        case "Wed":
            $nameOfDay = "الأربعاء";
            break;
        case "Thu":
            $nameOfDay = "الخميس";
            break;
    }
}


$query_missin_daye = " SELECT counter  from misin_it  WHERE it_name LIKE '%$key%' and misin_date like '%{$this_date}%' ";

$query_missin_daye_result = mysqli_query($conn, $query_missin_daye);

$rowcount_count = mysqli_num_rows($query_missin_daye_result);

echo  $rowcount_count . " / " . $workdays;

?>

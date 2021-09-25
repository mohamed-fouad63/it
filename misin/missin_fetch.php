<?php
session_start();
date_default_timezone_set('Africa/Cairo');
$session_id = $_SESSION['id'];
include '../connection.php';
$key = $_POST['key'];
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

$alldays = getMonth($date_missin_year, $date_missin_month);
?>

<?php
foreach ($alldays as $day) {
    $nameOfDay = date('D', strtotime($day));
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
    if ($nameOfDay != 'الجمعه') {

        $query_missin_daye = " SELECT
counter , misin_day,misin_date,id,it_name,office_name,misin_type,start_time,end_time
from misin_it where it_name like '%{$key}%' and misin_date like '%{$day}%' ORDER  BY start_time";

        $query_missin_daye_result = mysqli_query($conn, $query_missin_daye);

        $rowcount_count = mysqli_num_rows($query_missin_daye_result);

        if ($rowcount_count == 0 and $nameOfDay != 'السبت') { ?>
            <tr style="color:red;">
                <td></td>
                <td><?php echo $nameOfDay; ?></td>
                <td class="misin_date"><?php echo $day; ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <?php } else {
            while ($row_pc = mysqli_fetch_assoc($query_missin_daye_result)) { ?>
                <tr style="<?php if ($row_pc["misin_day"] == "السبت") {
                                echo 'color:#27AE60';
                            } ?>">
                    <td><?php echo $row_pc["it_name"] ?></td>
                    <td><?php echo $row_pc["misin_day"] ?></td>
                    <td class="misin_date"><?php echo $row_pc["misin_date"] ?></td>
                    <td><?php echo $row_pc["office_name"] ?></td>
                    <td><?php echo $row_pc["misin_type"] ?> </td>
                    <td><?php echo $row_pc["start_time"] ?></td>
                    <td><?php echo $row_pc["end_time"] ?></td>
                    <td class="td_hover">
                        <button type='button' class='btn-edit' data-toggle='modal' data-target='#misin_deleted' onclick='misin_deleted()'>
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                    <td style="display:none"><?php echo $row_pc["counter"] ?></td>
                </tr>
<?php }
        }
    }
}

?>
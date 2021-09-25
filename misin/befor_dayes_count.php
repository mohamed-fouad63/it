<?php
session_start();
date_default_timezone_set('Africa/Cairo');
include '../connection.php';
$key = $_POST['key'];
?>
<table class="table_dayes_before" id="table_dayes_before">
    <thead class="thead" id="thead" onclick="myFunction(this)">
        <tr>
            <th colspan=""><span class="arrow down" id="arrow"></span></th>
            <th id="before_dayes_count"></th>
        </tr>
    </thead>
    <tbody class="tbodychange" id="tbodychange">
        <?php
        $this_date = date("Y-m-d");

        $date_missin_month = date("m", strtotime($this_date)) - 1;

        $date_missin_year = date("Y", strtotime($this_date));

        $misin_date = $date_missin_year . "-" . $date_missin_month;
        // Set timezone


        // Start date
        $date = '2021-07-01';
        // End date
        $end_date = $misin_date . '-31';

        while (strtotime($date) <= strtotime($end_date)) {
            $nameOfDay = date('D', strtotime($date));
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

                $query_missin_daye = " SELECT counter  from misin_it where it_name = '$key' and misin_date = '$date'";

                $query_missin_daye_result = mysqli_query($conn, $query_missin_daye);

                $rowcount_count = mysqli_num_rows($query_missin_daye_result);

                if ($rowcount_count == 0 and $nameOfDay != 'السبت') {


        ?>
                    <tr style="color:red;">
                        <td><?php echo $nameOfDay; ?></td>
                        <td class="misin_date"><?php echo $date; ?></td>
                    </tr>
        <?php
                }
            }
            $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
        }

        ?>
    </tbody>
    <script>
        var table = document.getElementById("table_dayes_before");
        var tbodyRowCount = table.tBodies[0].rows.length;
        document.getElementById("before_dayes_count").innerText = tbodyRowCount + " يوم ";
    </script>
</table>
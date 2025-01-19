<!DOCTYPE html>
<html lang="en">
<head> <title>Days in Month</title> </head>
<body>
    <h1>Days in Month</h1>
    <form method="post">
        <label for="month">Enter the month (1-12):</label>
        <input type="number" id="month" name="month" min="1" max="12" required>
        <input type="submit" value="Check">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $month = $_POST["month"];
        switch ($month) {
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:  $days = 31;
            break;
            case 4:
            case 6:
            case 9:
            case 11:  $days = 30;
                break;
            case 2:
                $year = date("Y");
                if ((($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0)) {
                    $days = 29;
                } else { $days = 28; }
                break;
            default:
                $days = "Invalid month";
        }  echo "<p>Number of days in month $month: $days</p>";   }
    ?>
</body> </html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "green apple";

try{
    $conn=mysqli_connect($servername,$username,$password,$dbname);
}catch(mysqli_sql_exception){
    echo "could not connect";
}

if($conn){
    echo "connected successfully";
    }



// Fetch data from the database
            $sql = "SELECT , sunday, monday, tuesday, wednesday, thursday, friday, saturday FROM overweight meal plan";
            $result = mysqli_query($conn, $sql);

            // Display data in the HTML table
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["sunday"] . "</td>";
                    echo "<td>" . $row["monday"] . "</td>";
                    echo "<td>" . $row["tuesday"] . "</td>";
                    echo "<td>" . $row["wednesday"] . "</td>";
                    echo "<td>" . $row["thursday"] . "</td>";
                    echo "<td>" . $row["friday"] . "</td>";
                    echo "<td>" . $row["saturday"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No data found</td></tr>";
            }

            // Close the database connection
            mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fetching Data from Database</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Sunday</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
            </tr>
        </thead>
        <tbody>
            

            
        </tbody>
    </table>
</body>
</html>

            
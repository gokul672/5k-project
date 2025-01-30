<?php
include 'connet.php';




if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT * FROM studentinfoo";
$result = $conn->query($sql);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/StudentList.css" />
    <link rel="icon" href="images/Academy-Logo.png" />
    <title>Student List</title>
</head>

<body>
    <header class="container">
        <nav class="navbar">
            <a href="" class="backBtnContainer"><img src="images/arrow_back.png" alt="Back" width="40"
                    class="backBtn" /></a>
            <div id="search-box-wrapper">
                <input type="text" id="search-input" placeholder="Search for students..." class="searchInput" />
            </div>
            <div class="filterContainer">
                <div class="filter-btn-container">
                    <button class="filter-btn" id="filterBtn">
                        <img src="images/filter.png" width="50" class="filter-img" />
                    </button>
                    <div id="filterOption">
                        <select class="filters">
                            <option value="">Select Category</option>
                            <option value="Under-12">Under-12</option>
                            <option value="Under-14">Under-14</option>
                            <option value="Under-16">Under-16</option>
                            <option value="Under-18">Under-18</option>
                            <option value="Under-20">Under-20</option>
                        </select>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div id="list-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>cate</th>

                </tr>
            </thead>
            <tbody>
                <?php




                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $name = $row['usname'];
                        echo "  <tr>
                          
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['usname'] . "</td>
                            <td>" . $row['eventcateg'] . "</td>
                            <td><a href='studentprofile.php?id=$name'>viwe</a></td>
                          </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }
                ?>

            </tbody>
        </table>

    </div>
    <script src="script/StudentList.js"></script>
</body>

</html>
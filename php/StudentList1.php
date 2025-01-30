<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- <link rel="stylesheet" href="style/StudentList.css" /> -->
        <link rel="icon" href="images/Academy-Logo.png" />
        <title>Student List</title>
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "poppins", sans-serif;
            }

            .container {
                /* border: 1px solid var(--border-color); */
                background-color: #00b4db;
            }

            .navbar {
                display: flex;
                justify-content: space-around;
                align-items: center;
                padding: 10px;
                color: #fff;
                height: 75px;
            }

            .backBtnContainer {
                /* border: 1px solid #000; */
                width: 5%;
            }

            .backBtn {
                vertical-align: middle;
            }

            #search-box-wrapper {
                /* border: 1px solid #000; */
                width: 100%;
                height: 45px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .searchInput {
                width: 100%;
                height: 100%;
                border: 1px solid;
                padding: 10px;
                font-size: 1.2rem;
                border-radius: 5px;
            }

            .filterContainer {
                /* border: 1px solid #000; */
                flex-grow: 1;
            }

            .filter-btn-container {
                /* border: 1px solid #000; */
                display: flex;
                align-items: center;
                justify-content: space-around;
            }

            .filter-btn {
                background-color: #00b4db;
                border: none;
            }

            #filterOption {
                display: none;
            }

            .filters {
                /* border: 1px solid #000; */
                display: flex;
                gap: 10px;
                width: 110px;
                height: 40px;
                border-radius: 10px;
                padding: 5px;
                font-size: 1rem;
            }

            #list-container {
                /* border: 1px solid #000; */
                margin: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
                font-size: 1.2rem;
                font-weight: normal;
            }

            table td {
                border-bottom: 1px solid #000;
                padding: 10px;
            }

            table th {
                background-color: #00b4db;
                color: white;
                padding: 10px;
            }

            .noMatchFound {
                border-bottom: none;
            }
        </style>
    </head>

    <body>
        <header class="container">
            <nav class="navbar">
                <a href="" class="backBtnContainer"
                    ><img
                        src="images/arrow_back.png"
                        alt="Back"
                        width="40"
                        class="backBtn"
                /></a>
                <div id="search-box-wrapper">
                    <input
                        type="text"
                        id="search-input"
                        placeholder="Search for students..."
                        class="searchInput"
                    />
                </div>
                <div class="filterContainer">
                    <div class="filter-btn-container">
                        <button class="filter-btn" id="filterBtn">
                            <img
                                src="images/filter.png"
                                width="50"
                                class="filter-img"
                            />
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
                        <th>category</th>
                        <th>Status</th>
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

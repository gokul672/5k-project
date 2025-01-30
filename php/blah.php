<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Fee List</title>
        <!-- <link rel="stylesheet" href="style/paidList.css" /> -->
        <link rel="icon" href="images/Academy-Logo.png" />

        <style>
            @import url("https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "Poppins", sans-serif;
            }

            .heading {
                background-color: #00b4db;
                color: white;
                padding: 15px;
                font-size: 1.5rem;
                font-weight: 600;
                text-align: center;
            }

            #listContainer {
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

            .noMatchFound td {
                border: none;
            }

            .payBtn {
                padding: 8px 16px;
                background-color: #00b4db;
                border: none;
                color: white;
                font-size: 1rem;
                border-radius: 5px;
            }

            .paidOption {
                color: green;
                font-weight: 600;
            }
        </style>
    </head>

    <body>
        <header class="heading">
            <p id="header">4 Dimensions Athletic Academy</p>
        </header>
        <div id="listContainer">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?>Id</td>
                        <td><?php echo $row['usname']; ?>Name</td>
                        <td>
                            <?php echo ucfirst($row['payment_status']); ?>
                            </?php>Paid
                        </td>

                        <td>
                            <?php echo $row['datee'] ? $row['datee'] : 'N/A'; ?>Date
                        </td>
                        <td>
                            <?php if ($row['payment_status'] == 'unpaid'): ?>
                            <form action="pay.php" method="POST">
                                <input
                                    type="hidden"
                                    name="id"
                                    value="<?php echo $row['id']; ?>"
                                />
                                <button type="submit" class="payBtn">
                                    Pay
                                </button>
                            </form>
                            <?php else: ?>
                            <span class="paidOption">Paid</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <tr class="noMatchFound">
                        <td colspan="5">No students found</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <!-- <script src="js/FeeList.js"></script> -->
    </body>
</html>

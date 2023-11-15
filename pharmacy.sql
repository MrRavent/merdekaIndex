<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Pharmacy</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-primary text-white text-center py-5">
        <h1>Welcome to Our Pharmacy</h1>
    </header>

    <div class="container mt-5">
        <h2>Featured Medicines</h2>
        <ul class="list-group">
            <?php
            $conn = new mysqli('localhost', 'root', '', 'pharmacy');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM medicines";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<li class="list-group-item">' . $row['NAME'] . ' (Generic Name: ' . $row['GENERIC_NAME'] . ')</li>';
                }
            } else {
                echo "No medicines available.";
            }
            $conn->close();
            ?>
        </ul>

        <h2 class="mt-5">Customer Testimonials</h2>
        <div class="row">
            <?php
            $conn = new mysqli('localhost', 'root', '', 'pharmacy');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM customers LIMIT 3";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">' . $row['NAME'] . '</h5>
                                    <p class="card-text">' . $row['DOCTOR_NAME'] . ' is a great doctor!</p>
                                </div>
                            </div>
                        </div>';
                }
            } else {
                echo "No customer testimonials available.";
            }
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

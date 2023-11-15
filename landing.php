<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Pharmacy</title>
    <!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-primary text-white text-center py-5">
        <h1>Welcome to Our Pharmacy</h1>
    </header>

    <div class="container mt-5">
        <h2>Featured Medicines</h2>
        <ul class="owl-carousel list-group" id="featured-medicines-carousel">
    <?php
    $conn = new mysqli('localhost', 'root', '', 'pharmacy');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM medicines";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<li class="list-group-item">
                    ' . $row['NAME'] . '<br>
                    (Generic Name: ' . $row['GENERIC_NAME'] . ')
                    <img src="images/' . $row['IMAGE_FILENAME'] . '" alt="' . $row['NAME'] . '" width="100">
                </li>';
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
                        <img src="images/' . $row['IMAGE_FILENAME'] . '" class="card-img-top" alt="' . $row['NAME'] . '">
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
<script>
    $(document).ready(function () {
        $("#featured-medicines-carousel").owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    });
</script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>

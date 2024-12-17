<?php 
session_start();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Check The Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <h4 class="card-header">Check The Reservation</h4>
        </div>
        <div class="card-body">
            <form action="sendmail.php" method="post">
                <div class="mb-3">
                    <label style="color: dark;" for="name"> Name:</label>
                    <input class="form-control form-control-user" type="text" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label style="color: dark;" for="surname"> Surname:</label>
                    <input class="form-control form-control-user" type="text" id="surname" name="surname">
                <div class="mb-3">
                    <label for="email_address">Email</label>
                    <input type="email" class="form-control" id="email_address" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="musee_name">Musee Name</label>
                    <input class="form-control" id="musee_name" name="musee_name" required></input>
                </div>
                <div class="mb-3">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="mb-3">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" id="time" name="time" required>
                </div>
                <div class="mb-3">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="mb-3">
                    <button type="submit" name="approved" class="btn btn-success">Send</button>
                </div>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
            var messageText = '<?php echo $_SESSION['status'] ?? ''; ?>';
                if(messageText != ''){
                Swal.fire({
                    icon: 'success',
                    title: 'Thank you !',
                    text: messageText,
                });
                <?php unset($_SESSION['status']); ?>
            }
    </script>


</body>
</html>
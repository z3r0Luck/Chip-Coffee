<?php
session_start();
if (!isset($_SESSION['email'])) {
    http_response_code(400);
    header("location: /");
}
if ($_SESSION['addressExists'] == 0) header("location: ../home/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script async src="/bootstrap-4.5.0/js/bootstrap.bundle.min.js"></script>
    <script async src="checkout.js"></script>
    <script async src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <title>Chip Coffee | Online Coffee Delivery</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;523;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/checkout.css">
    <link rel="stylesheet" type="text/css" href="/css/footer.css">
    <link rel="stylesheet" href="/bootstrap-4.5.0/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="/images/chip_coffee.png" size="20x20">
</head>
<body>
    <div id="blurred" class="blurred"></div>
    <div id="loader" class="loader lds-dual-ring"></div>
    <div class="background">
        <nav class="navbar navbar-light container">
            <a class="navbar-brand" href="/home/">
                <img src="/images/chip_coffee_page.png" class="logo" alt="Chip Coffee">
            </a>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['firstName']; ?> <i class='far fa-user'></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="/profile/">Ο λογαριασμός μου</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/php/logout.php">Αποσύνδεση</a>
                </div>
            </div>
        </nav>
        <div class="container py-3">
            <h1>Ολοκλήρωση Παραγγελίας</h1>
        </div>
    </div>
    <div class="container my-5" id="orderCompletion">
        <div id="false"></div>
        <div class="row d-flex justify-content-center">
            <div class="col-xl-4 col-md-12 col-12 box p-xl-5 p-md-5">
                <h4 class="mb-2">1. Στοιχεία Παραγγελίας</h4>
                <div class="row">
                    <div class="col-xl-8 col-12" id="input">
                        <label for="doorbell">Όνομα στο κουδούνι *</label>
                        <input type="text" class="form-control" id="doorname" required>
                        <div class="text-danger">Πρέπει να συμπληρώσεις όνομα στο κουδούνι.</div>
                    </div>
                    <div class="col-md-4" id="input">
                        <label for="floor">Όροφος *</label>
                        <input type="number" class="form-control" id="floor" required>
                        <div class="text-danger">Πρέπει να συμπληρώσεις τον όροφο.</div>
                    </div>
                </div>
                <div class="space">
                    <label for="address">Προαιρετικό τηλ. επικοινωνίας</label>
                    <input type="number" class="form-control" id="phone">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Σχόλια διεύθυνσης</label>
                    <textarea class="form-control" id="comment" rows="3" placeholder="Π.χ. Καλέστε στο τηλέφωνο αντί να χτυπήσετε κουδούνι"></textarea>
                </div>
            </div>
            <div class="col-xl-4 col-md-12 col-12 box p-xl-5 p-md-5">
                <h4 class="mb-2">2. Τρόπος Πληρωμής</h4>
                <div class="form-group">
                    <div class="d-block mt-4">
                        <div class="list-group form-check">
                            <input class="form-check-input" type="radio" name="payment" value="paypal" id="paypal" required/>
                            <label class="list-group-item form-check-label" for="paypal">PayPal</label>
                            <input class="form-check-input" type="radio" name="payment" value="credit" id="card" required/>
                            <label class="list-group-item form-check-label" for="card">Πιστωτική/Χρεωστική Κάρτα</label>
                            <div class="text-danger" id="payment">
                                Πρέπει να διαλέξεις έναν τρόπο πληρωμής.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12 col-12 box p-xl-5 p-md-5">
                <h4 class="d-flex justify-content-between align-items-center mb-4">3. Ολοκλήρωση</h4>
                <ul class="list-group mb-1" id="FinalCart"></ul>
                <button class="btn mainbtn text-white btn-lg btn-block my-2" type="button" onclick="sendOrder()">Αποστολή Παραγγελίας</button>
            </div>
        </div>
    </div>
    <!---------------------SALE SEcTi0N---------------------->
    <?php echo file_get_contents("../views/sale.html"); ?>
    <!-- Newsletter -->
    <?php echo file_get_contents("../views/newsletter.html"); ?>
    <!-------------------- Site footer ---------------------->
    <?php echo file_get_contents("../views/footer.html"); ?>
</body>
</html>
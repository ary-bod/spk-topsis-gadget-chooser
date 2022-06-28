<?php

include('_functions.php');

if ($_POST) {
  $name = mysqli_real_escape_string($connection, trim($_POST['name']));
  $price = mysqli_real_escape_string($connection, trim($_POST['price']));
  $memory = mysqli_real_escape_string($connection, trim($_POST['memory']));
  $storage = mysqli_real_escape_string($connection, trim($_POST['storage']));
  $processor = mysqli_real_escape_string($connection, trim($_POST['processor']));
  $camera_front = mysqli_real_escape_string($connection, trim($_POST['camera_front']));
  $camera_back = mysqli_real_escape_string($connection, trim($_POST['camera_back']));
  $battery = mysqli_real_escape_string($connection, trim($_POST['battery']));

  if ($price <  1500000) {
    $price_score = 5;
  } elseif ($price >= 1500000 && $price <= 3000000) {
    $price_score = 4;
  } elseif ($price > 3000000 && $price <= 5000000) {
    $price_score = 3;
  } elseif ($price > 5000000 && $price <= 10000000) {
    $price_score = 2;
  } elseif ($price > 10000000) {
    $price_score = 1;
  }

  if ($memory <= 4) {
    $memory_score = 1;
  } elseif ($memory <= 8 && $memory > 4) {
    $memory_score = 3;
  } elseif ($memory > 8) {
    $memory_score = 5;
  }

  if ($storage <= 16) {
    $storage_score = 1;
  } elseif ($storage == 32) {
    $storage_score = 2;
  } elseif ($storage == 64) {
    $storage_score = 3;
  } elseif ($storage == 128) {
    $storage_score = 4;
  } elseif ($storage > 128) {
    $storage_score = 5;
  }

  if ($processor == "Dualcore") {
    $processor_score = 1;
  } elseif ($processor == "Quadcore") {
    $processor_score = 3;
  } elseif ($processor == "Hexacore") {
    $processor_score = 4;
  } elseif ($processor == "Octacore") {
    $processor_score = 5;
  }

  if ($camera_front <= 8) {
    $camera_front_score = 1;
  } elseif ($camera_front > 8 && $camera_front <= 12) {
    $camera_front_score = 3;
  } elseif ($camera_front > 12) {
    $camera_front_score = 5;
  }

  if ($camera_back <= 18) {
    $camera_back_score = 1;
  } elseif ($camera_back > 18 && $camera_back <= 32) {
    $camera_back_score = 3;
  } elseif ($camera_back > 32) {
    $camera_back_score = 5;
  }

  if ($battery <= 2000) {
    $battery_score = 1;
  } elseif ($battery > 2000 && $battery < 5000) {
    $battery_score = 3;
  } elseif ($battery >= 5000) {
    $battery_score = 5;
  }

  $insert_time = time();
  $insert_query = "INSERT INTO gadgets (name, price, memory, storage, processor, camera_front, camera_back, battery,
    price_score, memory_score, storage_score, processor_score, camera_front_score, camera_back_score, battery_score, created_at) 
    VALUES ('$name', '$price', '$memory', '$storage', '$processor', '$camera_front', '$camera_back', '$battery', 
    '$price_score', '$memory_score', '$storage_score', '$processor_score', '$camera_front_score', '$camera_back_score', '$battery_score', 
    '$insert_time');";
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>SPK Gadget - For Your Solution</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="index.php"><strong>SPK Gadget</strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gadget-list.php">Gadget List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="find-gadget.php">Find Gadget</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold">Our Gadget List - Add Gadget</h1>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
      <a href="gadget-list.php" class="btn btn-outline-primary btn-lg px-4 gap-3">Back</a>
    </div>
  </div>
  <div class="px-4 py-5 my-5">
    <div class="container">
      <?php if ($_POST) : ?>
        <?php if (mysqli_query($connection, $insert_query)) : ?>
          <div class="alert alert-success">
            New Gadget add successfully!
          </div>
        <?php else : ?>
          <div class="alert alert-warning">
            New Gadget failed to add! Error: <?= mysqli_errno($connection); ?>
          </div>
        <?php endif; ?>
      <?php endif; ?>
      <form method="POST">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group mb-3">
              <label class="form-label" for="name"><span class="text-danger">* </span>Gadget Name</label>
              <input name="name" type="text" class="form-control" id="name" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="price"><span class="text-danger">* </span>Gadget Price (Rupiah)</label>
              <input name="price" type="number" class="form-control" id="price" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="memory"><span class="text-danger">* </span>Gadget Memory (GB)</label>
              <input name="memory" type="number" class="form-control" id="memory" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="storage"><span class="text-danger">* </span>Gadget Storage (GB)</label>
              <input name="storage" type="number" class="form-control" id="storage" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="processor"><span class="text-danger">* </span>Gadget Processor</label>
              <select id="processor" name="processor" class="form-select" required>
                <option value="" selected>-</option>
                <option value="Dualcore">Dualcore</option>
                <option value="Quadcore">Quadcore</option>
                <option value="Hexacore">Hexacore</option>
                <option value="Octacore">Octacore</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="camera_front"><span class="text-danger">* </span>Gadget Camera Front (MP)</label>
              <input name="camera_front" type="number" class="form-control" id="camera_front" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="camera_back"><span class="text-danger">* </span>Gadget Camera Back (MP)</label>
              <input name="camera_back" type="number" class="form-control" id="camera_back" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="battery"><span class="text-danger">* </span>Gadget Battery (mAh)</label>
              <input name="battery" type="number" class="form-control" id="battery" required>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add New Gadget</button>
      </form>
    </div>
  </div>
  <footer class="text-dark text-center py-3">
    <div class="container">
      <p class="mb-0">Copyright 2022 &copy; SPK Gadget - For Your Solution
      </p>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    $(document).ready(function() {
      if (window.history.replaceState) window.history.replaceState(null, null, window.location.href);

      window.setTimeout(function() {
        const alert = document.getElementsByClassName('alert');
        if (alert.length > 0) {
          $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
            $(this).remove();
          });
        }
      }, 3000);
    });
  </script>
</body>

</html>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>SPK Gadget - For Your Solution | Find Gadget Recommendation</title>
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
            <a class="nav-link active" href="find-gadget.php"><strong>Find Gadget</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold">Your Favorite Gadget Chooser</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Who are we? We provided best solution for you to choose your new brand gadget! We using TOPSIS algorithm to pick your best ideal gadget to use. Maybe it isnt best solution for you, but we suggest you this solution.</p>
    </div>
  </div>
  <div class="px-4 py-5 my-5 text-left">
    <div class="container">
      <form method="POST" action="result.php">
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label class="form-label" for="price"><span class="text-danger">* </span> Price</label>
              <select id="price" name="price" class="form-select" required>
                <option value="" selected>-</option>
                <option value="5">
                  < Rp1.500.000 </option>
                <option value="4">Rp1.500.000 - Rp3.000.000</option>
                <option value="3">Rp3.000.001 - Rp5.000.000</option>
                <option value="2">Rp5.000.001 - Rp10.000.000</option>
                <option value="1">> Rp10.000.001</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label class="form-label" for="memory"><span class="text-danger">* </span> Memory</label>
              <select id="memory" name="memory" class="form-select" required>
                <option value="" selected>-</option>
                <option value="1">0 - 2 GB</option>
                <option value="2">4 GB</option>
                <option value="3">8 GB</option>
                <option value="4">16 GB</option>
                <option value="5">> 16 GB</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label class="form-label" for="storage"><span class="text-danger">* </span> Storage</label>
              <select id="storage" name="storage" class="form-select" required>
                <option value="" selected>-</option>
                <option value="1">0 - 4 GB</option>
                <option value="2">8 Gb</option>
                <option value="3">16 GB</option>
                <option value="4">32 Gb</option>
                <option value="5">> 32 GB</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label class="form-label" for="processor"><span class="text-danger">* </span> Processor</label>
              <select id="processor" name="processor" class="form-select" required>
                <option value="" selected>-</option>
                <option value="1">Dualcore</option>
                <option value="3">Quadcore</option>
                <option value="4">Hexacore</option>
                <option value="5">Octacore</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label class="form-label" for="camera_front"><span class="text-danger">* </span> Camera Front</label>
              <select id="camera_front" name="camera_front" class="form-select" required>
                <option value="" selected>-</option>
                <option value="1">0 - 8 MP</option>
                <option value="3">8 - 12 MP</option>
                <option value="5">> 12 MP</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label class="form-label" for="camera_back"><span class="text-danger">* </span> Camera Back</label>
              <select id="camera_back" name="camera_back" class="form-select" required>
                <option value="" selected>-</option>
                <option value="1">0 - 18 MP</option>
                <option value="3">18 - 32 MP</option>
                <option value="5">> 32 MP</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label class="form-label" for="battery"><span class="text-danger">* </span> Battery</label>
              <select id="battery" name="battery" class="form-select" required>
                <option value="" selected>-</option>
                <option value="1">
                  < 2000 mAh</option>
                <option value="3">2000 mAh - 5000 mAh</option>
                <option value="5">> 5000 mAh</option>
              </select>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Find Gadget Recommendation</button>
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
</body>

</html>
<?php

include('_functions.php');

if ($_POST) {
  $gadgets = get_gagdets();
  foreach ($gadgets as $index => $gadget) {
    $matrix[$index] = [
      $gadget['price_score'], $gadget['memory_score'], $gadget['storage_score'], $gadget['processor_score'],
      $gadget['camera_front_score'], $gadget['camera_back_score'], $gadget['battery_score']
    ];
  }
} else {
  header('Location: find-gadget.php');
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>SPK Gadget - For Your Solution | Result Recommendation</title>
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
    <h1 class="display-5 fw-bold">Your Favorite Gadget Chooser</h1>
    <p class="lead">Scroll down to view your gadget that we suggest!</p>
  </div>
  <div class="px-4 pb-5 mb-5 text-left">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center"><strong>Normalized Matrix, (R)</strong></h3>
          <table class="table table-striped table-hover w-100 mt-5">
            <thead>
              <tr>
                <th>Alternative</th>
                <th>C1 (Cost)</th>
                <th>C2 (Benefit)</th>
                <th>C3 (Benefit)</th>
                <th>C4 (Benefit)</th>
                <th>C5 (Benefit)</th>
                <th>C6 (Benefit)</th>
                <th>C7 (Benefit)</th>
              </tr>
            </thead>
            <tbody>
              <?php $dividen_matrix = dividen_normalization($matrix); ?>
              <?php foreach ($gadgets as $index => $gadget) : ?>
                <?php $matrix_normalization[$index] = [
                  $gadget['price_score'] / $dividen_matrix[0],
                  $gadget['memory_score'] / $dividen_matrix[1],
                  $gadget['storage_score'] / $dividen_matrix[2],
                  $gadget['processor_score'] / $dividen_matrix[3],
                  $gadget['camera_front_score'] / $dividen_matrix[4],
                  $gadget['camera_back_score'] / $dividen_matrix[5],
                  $gadget['battery_score'] / $dividen_matrix[6]
                ]; ?>
                <tr class="align-middle text-left">
                  <td>Gadget #<?= $gadget['id']; ?></td>
                  <td><?= round($gadget['price_score'] / $dividen_matrix[0], 6) ?></td>
                  <td><?= round($gadget['memory_score'] / $dividen_matrix[1], 6) ?></td>
                  <td><?= round($gadget['storage_score'] / $dividen_matrix[2], 6) ?></td>
                  <td><?= round($gadget['processor_score'] / $dividen_matrix[3], 6) ?></td>
                  <td><?= round($gadget['camera_front_score'] / $dividen_matrix[4], 6) ?></td>
                  <td><?= round($gadget['camera_back_score'] / $dividen_matrix[5], 6) ?></td>
                  <td><?= round($gadget['battery_score'] / $dividen_matrix[6], 6) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="px-4 py-5 my-5 text-left">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center"><strong>Weight, (W)</strong></h3>
          <table class="table table-striped table-hover w-100 mt-5">
            <thead>
              <tr>
                <th>Price (Cost)</th>
                <th>Memory (Benefit)</th>
                <th>Storage (Benefit)</th>
                <th>Processor (Benefit)</th>
                <th>Camera Front (Benefit)</th>
                <th>Camera Back (Benefit)</th>
                <th>Battery (Benefit)</th>
              </tr>
            </thead>
            <tbody>
              <tr class="align-middle text-center">
                <td><?= $_POST['price']; ?></td>
                <td><?= $_POST['memory']; ?></td>
                <td><?= $_POST['storage']; ?></td>
                <td><?= $_POST['processor']; ?></td>
                <td><?= $_POST['camera_front']; ?></td>
                <td><?= $_POST['camera_back']; ?></td>
                <td><?= $_POST['battery']; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="px-4 pb-5 mb-5 text-left">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center"><strong>Weighted Normalized Matrix, (Y)</strong></h3>
          <table class="table table-striped table-hover w-100 mt-5">
            <thead>
              <tr>
                <th>Alternative</th>
                <th>C1 (Cost)</th>
                <th>C2 (Benefit)</th>
                <th>C3 (Benefit)</th>
                <th>C4 (Benefit)</th>
                <th>C5 (Benefit)</th>
                <th>C6 (Benefit)</th>
                <th>C7 (Benefit)</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($gadgets as $index => $gadget) : ?>
                <?php $weighted_matrix_normalization[$index] = [
                  $matrix_normalization[$index][0] * $_POST['price'],
                  $matrix_normalization[$index][1] * $_POST['memory'],
                  $matrix_normalization[$index][2] * $_POST['storage'],
                  $matrix_normalization[$index][3] * $_POST['processor'],
                  $matrix_normalization[$index][4] * $_POST['camera_front'],
                  $matrix_normalization[$index][5] * $_POST['camera_back'],
                  $matrix_normalization[$index][6] * $_POST['battery'],
                ]; ?>
                <tr class="align-middle text-left">
                  <td>Gadget #<?= $gadget['id']; ?></td>
                  <td><?= round($matrix_normalization[$index][0] * $_POST['price'], 6) ?></td>
                  <td><?= round($matrix_normalization[$index][1] * $_POST['memory'], 6) ?></td>
                  <td><?= round($matrix_normalization[$index][2] * $_POST['storage'], 6) ?></td>
                  <td><?= round($matrix_normalization[$index][3] * $_POST['processor'], 6) ?></td>
                  <td><?= round($matrix_normalization[$index][4] * $_POST['camera_front'], 6) ?></td>
                  <td><?= round($matrix_normalization[$index][5] * $_POST['camera_back'], 6) ?></td>
                  <td><?= round($matrix_normalization[$index][6] * $_POST['battery'], 6) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="px-4 pb-5 mb-5 text-left">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center"><strong>Matrix of Positive and Negative Ideal Solutions</strong></h3>
          <table class="table table-striped table-hover w-100 mt-5">
            <thead>
              <tr>
                <th></th>
                <th>Y1 (Cost)</th>
                <th>Y2 (Benefit)</th>
                <th>Y3 (Benefit)</th>
                <th>Y4 (Benefit)</th>
                <th>Y5 (Benefit)</th>
                <th>Y6 (Benefit)</th>
                <th>Y7 (Benefit)</th>
              </tr>
            </thead>
            <tbody>
              <?php $transpozed_weighted_normalization = transpoze($weighted_matrix_normalization); ?>
              <?php
              $positive_ideal = [
                min($transpozed_weighted_normalization[0]), max($transpozed_weighted_normalization[1]),
                max($transpozed_weighted_normalization[2]), max($transpozed_weighted_normalization[3]),
                max($transpozed_weighted_normalization[4]), max($transpozed_weighted_normalization[5]),
                max($transpozed_weighted_normalization[6])
              ];
              $negative_ideal = [
                max($transpozed_weighted_normalization[0]), min($transpozed_weighted_normalization[1]),
                min($transpozed_weighted_normalization[2]), min($transpozed_weighted_normalization[3]),
                min($transpozed_weighted_normalization[4]), min($transpozed_weighted_normalization[5]),
                min($transpozed_weighted_normalization[6])
              ];
              ?>
              <tr class="align-middle text-left">
                <td>A+</td>
                <td><?= round(min($transpozed_weighted_normalization[0]), 6); ?> (min)</td>
                <td><?= round(max($transpozed_weighted_normalization[1]), 6); ?> (max)</td>
                <td><?= round(max($transpozed_weighted_normalization[2]), 6); ?> (max)</td>
                <td><?= round(max($transpozed_weighted_normalization[3]), 6); ?> (max)</td>
                <td><?= round(max($transpozed_weighted_normalization[4]), 6); ?> (max)</td>
                <td><?= round(max($transpozed_weighted_normalization[5]), 6); ?> (max)</td>
                <td><?= round(max($transpozed_weighted_normalization[6]), 6); ?> (max)</td>
              </tr>
              <tr class="align-middle text-left">
                <td>A-</td>
                <td><?= round(max($transpozed_weighted_normalization[0]), 6); ?> (max)</td>
                <td><?= round(min($transpozed_weighted_normalization[1]), 6); ?> (min)</td>
                <td><?= round(min($transpozed_weighted_normalization[2]), 6); ?> (min)</td>
                <td><?= round(min($transpozed_weighted_normalization[3]), 6); ?> (min)</td>
                <td><?= round(min($transpozed_weighted_normalization[4]), 6); ?> (min)</td>
                <td><?= round(min($transpozed_weighted_normalization[5]), 6); ?> (min)</td>
                <td><?= round(min($transpozed_weighted_normalization[6]), 6); ?> (min)</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="px-4 pb-5 mb-5 text-left">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center"><strong>Distance Between Weighted Value of Each Alternative to The Positive Ideal Solution</strong></h3>
          <table class="table table-striped table-hover w-100 mt-5">
            <thead>
              <tr>
                <th></th>
                <th>D+</th>
                <th></th>
                <th>D-</th>
              </tr>
            </thead>
            <tbody>
              <?php $distance_plus = distance_ideal($positive_ideal, $weighted_matrix_normalization); ?>
              <?php $distance_min = distance_ideal($negative_ideal, $weighted_matrix_normalization); ?>

              <?php foreach ($gadgets as $index => $gadget) : ?>
                <?php $number = $index + 1; ?>
                <tr>
                  <td>D<?= $number; ?></td>
                  <td><?= round($distance_plus[$index], 6) ?></td>
                  <td>D<?= $number; ?></td>
                  <td><?= round($distance_min[$index], 6) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="px-4 pb-5 mb-5 text-left">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center"><strong>Preference Value for Each Alternative (V)</strong></h3>
          <table class="table table-striped table-hover w-100 mt-5">
            <thead>
              <tr>
                <th>Preference Value (V)</th>
                <th>Score</th>
              </tr>
            </thead>
            <tbody>
              <?php $scores = []; ?>

              <?php foreach ($gadgets as $index => $gadget) : ?>
                <?php array_push($scores, ($distance_min[$index] / ($distance_min[$index] + $distance_plus[$index]))); ?>
                <?php $number = $index + 1; ?>
                <tr>
                  <td>V<?= $number; ?></td>
                  <td><?= ($distance_min[$index] / ($distance_min[$index] + $distance_plus[$index])); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="px-4 pb-5 mb-5 text-left">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center"><strong>Gadget with Highest Preference Score</strong></h3>
          <table class="table table-striped table-hover w-100 mt-5">
            <thead>
              <tr>
                <th>Preference Value (V)</th>
                <th>Score</th>
                <th>Gadget Recommendation</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i = 0; $i < count($scores); $i++) : ?>
                <?php if ($scores[$i] == max($scores)) :  ?>
                  <!-- <?php $gadget = query("SELECT * FROM gadgets WHERE id = $i + 1")[0]; ?> -->
                  <td>V<?= $i + 1; ?></td>
                  <td><?= $scores[$i]; ?></td>
                  <!-- <td><?= $gadget['name']; ?></td> -->
                  <td><?= $gadgets[$i]['name']; ?></td>
                <?php endif; ?>
              <?php endfor; ?>
            </tbody>
          </table>
        </div>
      </div>
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
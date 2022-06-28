<?php

include('_functions.php');
$gadgets = get_gagdets();

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <title>SPK Gadget - For Your Solution | Gadget List</title>
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
            <a class="nav-link active" href="gadget-list.php"><strong>Gadget List</strong></a>
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
    <h1 class="display-5 fw-bold">Our Gadget List</h1>
    <div class="col-lg-6 mx-auto">
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-3">
        <a href="add-gadget.php" class="btn btn-outline-primary btn-md px-4 gap-3">Add New Gadget</a>
      </div>
    </div>
  </div>
  <div class="px-4 py-3 my-5 text-center">
    <div class="container">
      <table id="gadget-list" class="table table-striped table-hover w-100">
        <thead>
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Price</th>
            <th>Memory</th>
            <th>Storage</th>
            <th>Processor</th>
            <th>Camera</th>
            <th>Battery</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $number = 1; ?>
          <?php foreach ($gadgets as $gadget) : ?>
            <tr id="gadget-<?= $gadget['id']; ?>" class="align-middle text-left">
              <td><?= $number++; ?></td>
              <td><?= $gadget['name']; ?></td>
              <td>Rp <?= number_format($gadget['price']); ?></td>
              <td><?= $gadget['memory']; ?> GB</td>
              <td><?= $gadget['storage']; ?> GB</td>
              <td><?= $gadget['processor']; ?></td>
              <td><?= $gadget['camera_front']; ?> MP, <?= $gadget['camera_back']; ?> MP</td>
              <td><?= $gadget['battery']; ?> mAh</td>
              <td><?= date('d M y, H:i', $gadget['created_at']); ?></td>
              <td>
                <a class="btn btn-warning" href="edit-gadget.php?id=<?= $gadget['id']; ?>">Edit</a>
                <a class="btn btn-danger" href="remove-gadget.php?id=<?= $gadget['id']; ?>" data-id="<?= $gadget['id']; ?>">Remove</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Price</th>
            <th>Memory</th>
            <th>Storage</th>
            <th>Processor</th>
            <th>Camera</th>
            <th>Battery</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <div class="px-4 text-center">
    <h1 class="display-5 fw-bold">Gadget Analysis</h1>
  </div>
  <div class="px-4 my-5 text-center">
    <div class="container">
      <table class="table table-striped table-hover w-100">
        <thead>
          <tr>
            <th>No.</th>
            <th>Alternative</th>
            <th>C1 (Cost) P</th>
            <th>C2 (Benefit) M</th>
            <th>C3 (Benefit) S</th>
            <th>C4 (Benefit) P</th>
            <th>C5 (Benefit) CF</th>
            <th>C6 (Benefit) CB</th>
            <th>C7 (Benefit) B</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($gadgets as $gadget) : ?>
            <tr id="gadget-<?= $gadget['id']; ?>-x" class="align-middle text-left">
              <td><?= $no++; ?></td>
              <td>Gadget #<?= $gadget['id']; ?> (#<?= explode(' ', $gadget['name'])[0]; ?>)</td>
              <td><?= $gadget['price_score']; ?></td>
              <td><?= $gadget['memory_score']; ?></td>
              <td><?= $gadget['storage_score']; ?></td>
              <td><?= $gadget['processor_score']; ?></td>
              <td><?= $gadget['camera_front_score']; ?></td>
              <td><?= $gadget['camera_back_score']; ?></td>
              <td><?= $gadget['battery_score']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <footer class="text-dark text-center mt-5 py-3">
    <div class="container">
      <p class="mb-0">Copyright 2022 &copy; SPK Gadget - For Your Solution
      </p>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function() {
      $(".btn.btn-danger").each(function(index) {
        $(this).on("click", function(e) {
          e.preventDefault();
          let href = e.currentTarget.getAttribute('href')
          let id = e.currentTarget.getAttribute('data-id')

          Swal.fire({
            title: 'Apakah yakin ingin dihapus?',
            text: "Kamu tidak dapat mengembalikan data gadget apabila sudah dihapus.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok, hapus.',
            cancelButtonText: "Batal"
          }).then((result) => {
            if (result.isConfirmed) {
              jQuery.ajax({
                url: href,
                success: function(data) {
                  if (data == 1) {
                    $(`#gadget-${id}`).fadeOut();
                    $(`#gadget-${id}-x`).fadeOut();
                    Swal.fire(
                      'Berhasil!',
                      'Data gadget berhasil dihapus.',
                      'success'
                    )
                  } else {
                    Swal.fire(
                      'Gagal!',
                      'Sepertinya ada kesalahan.',
                      'warning'
                    )
                  }
                }
              })
            }
          })
        })
      });

      $('#gadget-list').DataTable();
    });
  </script>
</body>

</html>
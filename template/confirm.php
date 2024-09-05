<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Confirm Page</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css" />
</head>

<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-md-center">
      <div class="col-12 col-lg-5">
        <div class="text-center mb-5 text-muted">
          <h2>Confirm</h2>
        </div>
        <form method="post" action="">
          <?php if (!empty($_SESSION['error'])): ?>
            <h6 class="text-danger text-center">
              <?= $_SESSION['error']; ?>
            </h6>
          <?php
            unset($_SESSION['error']);
          endif; ?>
          <div class="mb-4">
            <label for="confirm" class="form-label">Enter your code </label>
            <input
              name="token"
              type="confirm"
              class="confirm w-100 p-1 border-0 rounded"
              id="confirm" />
          </div>

          <button type="confirm" class="btn submit">Submit</button>

        </form>
      </div>
      <div class="d-none d-lg-block col-lg-5">
        <img
          class="img-fluid img-thumbnail bg-light p-0 rounded"
          src="<?= BASE_URL ?>assets/img/jackNicholson.png"
          alt="" />
      </div>
    </div>
  </div>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>
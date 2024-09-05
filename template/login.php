<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login page</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/style.css"/>
  </head>
  <body class="bg-light">
    <div class="container mt-5">
      <div class="row justify-content-md-center">
        <div class="col-12 col-lg-5">
          <div class="text-center mb-5 text-muted">
            <h2>Login</h2>
          </div>
          <form method="post" action="" >
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input
                type="email"
                class="email w-100 p-1 border-0 rounded"
                id="email"
              />
            </div>
            <div class="mb-3 form-check">
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck1"
              />
              <label class="form-check-label" for="exampleCheck1"
                >Check me out</label
              >
            </div>

            <button type="submit" class="btn submit">Submit</button>
            <div class="mt-4">
              <p class="d-inline">already joined ?</p>
              <a class="col-6 link" href="<?=site_url('auth.php?action=sign-in')?>">sign in</a>
            </div>
          </form>
        </div>
        <div class="d-none d-lg-block col-lg-5">
          <img
            class="img-fluid img-thumbnail bg-light p-0 rounded"
            src="<?=BASE_URL?>assets/img/jenniferConnely.jpg"
            alt=""
          />
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport center</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Sport center</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/products">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/feedback">Feedback</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/membership">Memberships</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/purchase">Purchase</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/trainer">Trainer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/training_session">Trainer session</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/user">Users</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

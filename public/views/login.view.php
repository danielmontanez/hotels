<?php include_once "includes/_header.php"; ?>

<body class="p-5 mx-auto col-md-6 login" style="max-width: 800px;">
    <div class="alert alert-danger <?php echo isset($_GET['error']) ? 'd-block' : 'd-none' ?>" role="alert">
  There's an error. Please try again.
</div>
<form method="post" action="../actions/login.php">
    <div class="form-group">
    <h1 class="mb-4">Login</h1>
    </div>
    
    <div class="form-group">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="email" placeholder="name@example.com">
    </div>
    <div class="form-group">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name="password" >
    </div>
    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary float-right">Login</button>
    </div>
</form>

<?php include_once "includes/_footer.php"; ?>
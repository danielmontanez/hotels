<?php include_once "../includes/_header.php"; ?>

<body class="p-5 mx-auto col-md-6 signup" style="max-width: 800px;">
<form method="post" action="signup.process.php">
    <div class="form-group">
    <h1 class="mb-4">Sign Up</h1>
    </div>
    
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Ex: John Brown">
    </div>

    <div class="form-group">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="email" placeholder="name@example.com">
    </div>
    <div class="form-group">
      <label for="inputPassword4">Create Password</label>
      <input type="password" class="form-control" name="password" >
    </div>
    <div class="form-group">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" name="password_confirm" >
    </div>
    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary float-right">Sign Up</button>
    </div>
</form>

<?php include_once "../includes/_footer.php"; ?>
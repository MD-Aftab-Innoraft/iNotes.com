<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>iNotes - Home</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

  <div class="container mt-5">
    <h1 class="alert alert-info text-center">iNotes CRUD app</h1>
    <div class="row">
      <!-- Left Column -->
      <form class="col-sm-5" id="myForm" method="post">
        <h3 class="alert alert-success text-center">Add Tasks</h3>
        <div>
          <input type="hidden" id="stid" class="form-control">
          <label class="form-label">Name:</label>
          <input type="text" name="" id="nameid" class="form-control" minlength="1" maxlength="50" required>
        </div>
        <div>
          <label class="form-label">Email:</label>
          <input type="email" name="" id="emailid" class="form-control" required>
        </div>
        <div>
          <label class="form-label">Password:</label>
          <input type="password" name="" id="passwordid" class="form-control" minlength="1" maxlength="20" required>
        </div>
        <div class="d-grid">
          <button type="submit" id="btnadd" class="btn btn-primary d-grid mt-3">Submit</button>
        </div>

        <div id="msg" class="alert alert-danger mt-3"></div>
      </form>

      <!-- Right Column -->
      <div class="col-sm-7">
        <h3 class="alert alert-warning text-center">Show Tasks</h3>
        <div class="input-group">
          <img src="https://static.thenounproject.com/png/424964-200.png" height="50px">
          <input type="text" class="form-control" placeholder="Search" id="mytxt" onkeyup="myfun1()">
        </div>
        <table id="tasksTable" class="table text-center">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Password</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="tbody">

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="JS/myAjax.js"></script>
</body>

</html>

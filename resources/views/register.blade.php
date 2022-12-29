<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form action="register-user" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleInputPassword1">Name</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Name" name="name">
      </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Address</label>
      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Address" name="address">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Number</label>
        <input type="Number" class="form-control" id="exampleInputPassword1" placeholder="Number" name="number">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Profile</label>
        <input type="file" name="profile">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
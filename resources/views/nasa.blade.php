<!DOCTYPE html>
<html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>
    <center>
<h5>Enter Start And Ending Date</h5>

<form action="show-data" method="POST" >
    @CSRF
  <label for="start_date">Start Date:</label>
  <input type="date" id="start_date"  class="input-group date"  name="start_date" style="width:15%" required>

  <label for="end_date">End Date:</label>
  <input type="date" id="end_date"  class="input-group date"  name="end_date" style="width:15%" required>
  <input type="submit" >
</form>

<p><strong>Note:</strong> Both Fields are required</p>

</body>
</html>

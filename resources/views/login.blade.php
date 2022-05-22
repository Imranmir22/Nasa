<html>
    <form method="POST" action='/api/userlogin' enctype="multipart/form-data">
@csrf
@if (isset($msg))
    <h4>{{ $msg.' login to continue' }}</h4>
@endif
Name    <input type=text name='name' ><br><br>
Email   <input type=text name='email'><br><br>
<input type=submit>
</form>

</html

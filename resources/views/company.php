<!DOCTYPE html>
<form  action='company' method="POST">
    @csrf
Name <input type=text name="name"><br>
Email<input type=text name="email"><br>
logo<input type=text name="logo"><br>
Website<input type=file name="website"><br>
<input type=submit><br>
</form>

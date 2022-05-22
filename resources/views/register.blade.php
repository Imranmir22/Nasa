<html>
    <form method="POST" action='/api/registerd' enctype="multipart/form-data">
@csrf
Name    <input type=text name='name' ><br><br>
Email   <input type=text name='email'><br><br>
phone   <input type=text name='phone'><br><br>
file    <input type=file name='userfile'><br><br>
role <br>
Admin <input type=radio name=role value=admin>
User <input type=radio name=role value=user><br>

        <input type="submit">
</form>

</html

<form action="../send" method="POST">
    @csrf
    To<input type=text name='mail'><br>
    Subject<input type=text name='subject'><br>
    Body<input type=text name='body'><br>
    <input type=submit  value=Send>



</form>

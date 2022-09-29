<!DOCTYPE html>
<form  action={{  URL::to("/employee/$response->id") }} method="POST">
    @csrf
    @method('PUT')
    first_name<input type=text name="first_name" value="{{ $response->name }}"><br>
    last_name<input type=text name="last_name"  value="{{ $response->email }}"><br>
    company_id<input type=text name="company_id"  value="{{ $response->website }}"><br>
  
<input type=submit><br>
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
</form>
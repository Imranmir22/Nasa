<!DOCTYPE html>
<form  action={{  URL::to("/employee/$response->id") }} method="POST">
    @csrf
    @method('PUT')
    first_name<input type=text name="first_name" value="{{ $response->first_name }}"><br>
    last_name<input type=text name="last_name"  value="{{ $response->last_name }}"><br>
    company_id<input type=text name="company_id"  value="{{ $response->company_id }}"><br>
    email<input type=text name="email"  value="{{ $response->email }}"><br>
    phone<input type=text name="phone"  value="{{ $response->phone }}"><br>
<input type=submit><br>
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
</form>
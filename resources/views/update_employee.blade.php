<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<form  action={{  URL::to("/employee/$response->id") }} method="POST">
    @csrf
    @method('PUT')
    <label for="basic-url" class="form-label">First Name</label>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder=" First Name" value="{{ $response->first_name }}" aria-label="Username" name="first_name"aria-describedby="basic-addon1">
        @if($errors->has('first_name'))
        <div class="error">{{ $errors->first('first_name') }}</div>
        @endif
    </div>

    
    <label for="basic-url" class="form-label">Last Name</label>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Last Name" aria-label="Username" value="{{ $response->last_name }}" name="last_name"aria-describedby="basic-addon1">
        @if($errors->has('last_name'))
        <div class="error">{{ $errors->first('last_name') }}</div>
        @endif
    </div>

    

    <label for="basic-url" class="form-label">Gender</label>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Gender" aria-label="gender" value="{{ $response->gender }}"  name="gender"aria-describedby="basic-addon1">
        @if($errors->has('gender'))
        <div class="error">{{ $errors->first('gender') }}</div>
        @endif
    </div>

    <label for="basic-url" class="form-label">Email</label>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Email" aria-label="Username" value="{{ $response->email }}" name="email"aria-describedby="basic-addon1">
        @if($errors->has('email'))
        <div class="error">{{ $errors->first('email') }}</div>
        @endif
    </div>

    <label for="basic-url" class="form-label">Phone</label>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Phone" aria-label="Username" value="{{ $response->phone }}" name="phone"aria-describedby="basic-addon1">
        @if($errors->has('phone'))
        <div class="error">{{ $errors->first('phone') }}</div>
        @endif
    </div>

    <label for="basic-url" class="form-label">Company Id</label>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Company Id" aria-label="Username" value="{{ $response->company_id }}" name="company_id"aria-describedby="basic-addon1">
        @if($errors->has('company_id'))
        <div class="error">{{ $errors->first('company_id') }}</div>
        @endif
    </div>

<input type=submit><br>
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
</form>
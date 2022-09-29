<html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <body>
        <center>
<form  action='employee' method="POST" style="width:40%">
    @csrf

    <label for="basic-url" class="form-label">First Name</label>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder=" First Name" aria-label="Username" name="first_name"aria-describedby="basic-addon1">
        @if($errors->has('first_name'))
        <div class="error">{{ $errors->first('first_name') }}</div>
        @endif
    </div>


    <label for="basic-url" class="form-label">Last Name</label>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Last Name" aria-label="Username" name="last_name"aria-describedby="basic-addon1">
        @if($errors->has('last_name'))
        <div class="error">{{ $errors->first('last_name') }}</div>
        @endif
    </div>

    <label for="basic-url" class="form-label">Email</label>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Email" aria-label="Username" name="email"aria-describedby="basic-addon1">
        @if($errors->has('email'))
        <div class="error">{{ $errors->first('email') }}</div>
        @endif
    </div>

    <label for="basic-url" class="form-label">Phone</label>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Phone" aria-label="Username" name="phone"aria-describedby="basic-addon1">
        @if($errors->has('phone'))
        <div class="error">{{ $errors->first('phone') }}</div>
        @endif
    </div>

    <label for="basic-url" class="form-label">Company Id</label>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Company Id" aria-label="Username" name="company_id"aria-describedby="basic-addon1">
        @if($errors->has('company_id'))
        <div class="error">{{ $errors->first('company_id') }}</div>
        @endif
    </div>

    <div class="input-group mb-3">
        <input class="btn btn-outline-secondary" type="submit" value="Submit" id="button-addon1">
      </div>

</form>

<style>
    .error{
        color:red;
        padding: 5px;
        margin-top: 5px;
    }
</style>
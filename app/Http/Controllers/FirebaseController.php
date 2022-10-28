<?php
namespace App\Http\Controllers;
// require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Contract\Auth;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

use Illuminate\Http\Request;

class FirebaseController extends Controller
{
    //
    public function __construct(Auth $auth)
    {
       
        $this->auth = $auth;
    }
    
    function login()
    {

        
   
        $uid = 'some-uid';
        $customToken = $this->auth->createCustomToken($uid); // returns a token
        $idTokenString= $customToken->toString();
     
        $idTokenString= 'eyJhbGciOiJSUzI1NiIsImtpZCI6Ijk5NjJmMDRmZWVkOTU0NWNlMjEzNGFiNTRjZWVmNTgxYWYyNGJhZmYiLCJ0eXAiOiJKV1QifQ.eyJuYW1lIjoiTW9oYW1tYWQgSW1yYW4gTWlyIiwicGljdHVyZSI6Imh0dHBzOi8vbGgzLmdvb2dsZXVzZXJjb250ZW50LmNvbS9hLS9BQ05QRXU4LWN3cmk5ZzN1QkhISzZjMXpfdjI2eWd5NFRZRWFuTmQtYXBVZy1jOD1zOTYtYyIsImlzcyI6Imh0dHBzOi8vc2VjdXJldG9rZW4uZ29vZ2xlLmNvbS9uYXNhLTE2MzJmIiwiYXVkIjoibmFzYS0xNjMyZiIsImF1dGhfdGltZSI6MTY2NTIwMjMyMiwidXNlcl9pZCI6Ijhpb0UyMkM4RlBYWXh3YjJFajRBZUNZUW1aeTEiLCJzdWIiOiI4aW9FMjJDOEZQWFl4d2IyRWo0QWVDWVFtWnkxIiwiaWF0IjoxNjY1MjAyMzIyLCJleHAiOjE2NjUyMDU5MjIsImVtYWlsIjoiaW1yYW5taXI4NzU0M0BnbWFpbC5jb20iLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiZmlyZWJhc2UiOnsiaWRlbnRpdGllcyI6eyJnb29nbGUuY29tIjpbIjExNTY4NzM4MDI3NDM1OTA1NjU5MCJdLCJlbWFpbCI6WyJpbXJhbm1pcjg3NTQzQGdtYWlsLmNvbSJdfSwic2lnbl9pbl9wcm92aWRlciI6Imdvb2dsZS5jb20ifX0.QCjjkBLXUyVfnKEfod5YWuOtaoOMTaywEn4jHX3j_s2nS_uNarpgn4GkpV8bvtrK0cC2sOHR5YJbKnNo32HNEWOnxUjk5BaQuUIlfI38QbduyGFHXRhQTQOMD_joV_YkhtGvg-W0OJiFc9XoY8cAs0hn8NElQ7wbMn1ul5hKRdPieYYXhIPcYjYnm7bbjESGwQzYLgN0Xm20V16kxkEqw1faeLDIYzp8Yn7BBk8rWEhSia5nGp5c-rT1wl0Gev7FTTGiWH8ZSkU3D4Ldw7CClf6Zeg206eG2jfRKBx6NVIZBb3HzNH43XsH90xGnLVr4IoumVwBw3vaac-ffK9rEVw';

        try {
            $verifiedIdToken = $this->auth->verifyIdToken($idTokenString); //verifies the token
             dd($verifiedIdToken);
        } catch (FailedToVerifyToken $e) {
            echo 'The token is invalid: '.$e->getMessage();
        }
    }
}

<?php
namespace App\Http\Controllers\Api;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\User;
    use Exception;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Tymon\JWTAuth\Facades\JWTAuth;
    use Symfony\Component\HttpKernel\Exception\HttpException;
//zitha
    use Tymon\JWTAuth\Exceptions\JWTException;
    use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
class AuthController extends Controller
{
    public function login(Request $request){

       /* $creds = $request->only(['email','password']);

        if(!$token=auth()->attempt($creds)){

            return response()->json([


                'success' => false,
                'result' => $token
            ]);
        }
        return response()->json([
            'success' =>true,
            'token' => $token,
            'user' => Auth::user()
        ]);*/
        $credentials = $request->only(['email', 'password']);

        try {
            $token = Auth::guard()->attempt($credentials);

            if(!$token) {
                throw new AccessDeniedHttpException();
            }

        } catch (JWTException $e) {
            throw new HttpException(500);
        }

        return response()
            ->json([
                'status' => 'ok',
                'token' => $token,
                'expires_in' => Auth::guard()->factory()->getTTL() * 60
            ]);

      /*$input=$request->all();
        if(!$token=JWTAuth::attempt($input)){

            return response()->json([

                'result' => 'created with succes'
            ]);
        }
        return response()->json([

            'result' => $token

        ]);*/
    }


    public function register(Request $request){

        $encryptedPass = Hash::make($request->password);

        $user = new User;

        try{
            $user->email = $request->email;
            $user->password = $encryptedPass;
            $user->save();
            return $this->login($request);
        }
        catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => ''.$e
            ]);
        }
    }

    public function logout(Request $request){
        try{
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            return response()->json([
                'success' => true,
                'message' => 'logout success'
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => ''.$e
            ]);
        }
    }

    // this function saves user name,lastname and photo
    public function saveUserInfo(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $photo = '';
        //check if user provided photo
        if($request->photo!=''){
            // user time for photo name to prevent name duplication
            $photo = time().'.jpg';
            // decode photo string and save to storage/profiles
            file_put_contents('storage/profiles/'.$photo,base64_decode($request->photo));
            $user->photo = $photo;
        }

        $user->update();

        return response()->json([
            'success' => true,
            'photo' => $photo
        ]);

    }
    //
}

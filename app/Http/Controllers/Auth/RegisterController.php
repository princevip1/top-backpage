<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Smtp;
use App\Models\Token;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string','max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        return null;
    }

    public function store(Request $request){

      $appName = config()->get('services.application.slugName');

       $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string','max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

       $newUser =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'status' => 'pending',
            'verified_status' => 'unverified',
            'balance' => '0',
            'password' => Hash::make($data['password']),
        ]);

        $smtp = Smtp::where('type', 'global_smtp')->first();

        if( $smtp){

            $token  = Str::uuid()->toString();

            //save token
            $newToken = new Token();
            $newToken->token = $token;
            $newToken->user_id = $newUser->id;
            $newToken->type = 'account';
            $newToken->save();

            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->CharSet = 'utf-8';
                $mail->SMTPAuth = true;
                $mail->SMTPDebug = 0;
                $mail->SMTPSecure = "TLS";
                $mail->Host = $smtp->host; //gmail has host > smtp.gmail.com
                $mail->Port = 587; //gmail has port > 587 . without double quotes
                $mail->Username = $smtp->username; //your username. actually your email
                $mail->Password = $smtp->password; // your password. your mail password

                $mail->setFrom($smtp->sender, $smtp->name);
                $mail->Subject = $appName." Account Verification";

                $baseUrl = route('verify-email');

                $msgBody = "Your account has been created successfully. Please click on this link to verify your email address. <br> <a href='".$baseUrl."?token=".$newToken->token."'>Click Here</a>";

                $message = '<html><body>';
                $message .= '<h1 style="color:#292422;font-size:18px;">Hello ' . $data['name'] . ',</h1></br>';
                $message .= '<p style="font-size:18px;">' . $msgBody . '</p>';
                $message .= '</body></html>';

                $mail->MsgHTML($message);
                $mail->addAddress($data['email'], $data['name']);
                $mail->send();

                return redirect()->route('login')->with('success', 'Registration successful. We sent an email to your email address. Please verify your email address to login.');
            } catch (Exception $e) {
                dd($e);
                $newUser->delete();
                return redirect()->route('login')->with('error', 'Sorry we are facing some tech issue. Please contact us for further instruction.');
            }

        }
        $newUser->delete();

        return redirect()->route('login')->with('error', 'Sorry we are facing some tech issue. Please contact us for further instruction.');

    }

    public function verifyEmail(Request $request){

        $token = $request->get('token');

        $token = Token::where('token', $token)->first();

        if($token){
            $user = User::find($token->user_id);

            if($user){

                $user->status = 'active';
                $user->save();

                $token->delete();

                return redirect()->route('login')->with('success', 'Your email address has been verified successfully. Please login to continue.');
            }
        }

        return redirect()->route('login')->with('error', 'Sorry we are facing some tech issue. Please contact us for further instruction.');

    }
}

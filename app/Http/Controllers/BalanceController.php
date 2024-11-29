<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\BalanceReloadHistory;
use Illuminate\Support\Facades\Http;


class BalanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $balance = $user->balance;
        $balanceReloadHistories = BalanceReloadHistory::where('user_id', $user->id)->get();

        $title = 'Reload Balance ¦ '.config()->get("services.application.slugName") ;

        return view('balance.index', compact('balance', 'balanceReloadHistories', 'title'));
    }

    public function store(Request $request)
    {
        $data = \request()->validate([
            'amount' => ['required', 'numeric', 'min:1'],
        ]);

        $transaction_id = rand();

        $response = Http::withHeaders([
            'X-CC-Api-Key' => config()->get('services.payment.coin_commerce_secret'),
            'X-CC-Version' => '2018-03-22'
        ])->post('https://api.commerce.coinbase.com/charges', [
            "name"=> config()->get('services.application.slugName')." Account Balance Reload",
            "description"=>  config()->get('services.application.slugName')." does support their users to create paid ad for better traffic quality. So this is the way to make paid post by reloading account balance.",
            "local_price"=> [
                "amount"=> $data['amount'],
                "currency"=> "USD"
            ],
            "pricing_type"=> "fixed_price",
            "metadata"=> [
                "customer_id"=> auth()->user()->id,
                "customer_name"=> auth()->user()->name
            ],
            "redirect_url"=> route('my_account_top_up_callback', ['status' => 'success', 'transaction_id'=>$transaction_id]),
            "cancel_url"=> route('my_account_top_up_callback', ['status' => 'canceled', 'transaction_id'=>$transaction_id]),
            "requested_info" => ["name", "email"]
        ]);


        if($response->status() == 400){
            return redirect()->route('reload-balance')->with('error', json_decode($response->body())->error->message);
        }else{

            $feedback_data = json_decode($response->body())->data;

            //create new history
            $new_history = new BalanceReloadHistory();
            $new_history->user_id = auth()->user()->id;
            $new_history->status = 'created';
            $new_history->transaction_id = $transaction_id;
            $new_history->amount = $data['amount'];
            $new_history->payment_method = 'bitcoin';
            $new_history->address = $feedback_data->addresses->bitcoin;
            $new_history->charge_code = $feedback_data->code;
            $new_history->charge_id = $feedback_data->id;
            $new_history->admin_approval = 'pending';
            $new_history->save();
            return redirect($feedback_data->hosted_url);

        }
    }


    public function accountReloadCallback(){
        $transaction_id = \request()->transaction_id;
        $status = \request()->status;
        $user_id = auth()->user()->id;
        $check_transaction = BalanceReloadHistory::where('user_id', $user_id)->where('transaction_id', $transaction_id)->first();

        $title = 'Transaction Status ¦ '.config()->get("services.application.slugName") ;

        if($check_transaction){

            $check_transaction_passed = true;
            return view('balance.account-balance-callback', compact('check_transaction', 'status', 'check_transaction_passed', 'title'));
        }else{
            $check_transaction_passed = false;
            return view('balance.account-balance-callback', compact('check_transaction', 'status', 'check_transaction_passed', 'title'));
        }
    }

}

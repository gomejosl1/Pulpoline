<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Store;
use DB;
use App\UserGuest;
use App\Role;
use App\Beneficiarios;
use App\Farmacias;
use App\Http\Controllers\Controller;
use Guzzle\Http\Exception\ClientErrorResponseException;
use AshAllenDesign\LaravelExchangeRates\ExchangeRate;
use carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function indexGuest($id)
    {
        $id = decrypt($id);
        return view('home', compact('id'));
    }

    public function guest(Request $request)
    {

        $data = request()->validate($this->rules());
        $Guest = DB::transaction(function () use ($data) {
            $users = UserGuest::where('emailGuest', $data['emailGuest'])->first();
            if (!$users) {
                $Guest = UserGuest::create([
                    'emailGuest' => $data['emailGuest'],
                ]);
            } else {
                $Guest = $users;
            }
            $status = 'registro exitoso';
            return $Guest;
        });
        return redirect()->route('guest_index', [encrypt($Guest->id)])->withStatus("Registro exitoso.");
    }


    public function exchangeCurrency(Request $request)
    {

        $idGuest = Request()->idGuest;

        $users = UserGuest::where('id', $idGuest)->first();
        $date = $users->date_guest;
        $date = Carbon::parse($date);
        if ($users->attemps < 5) {
            $attemp = $users->attemps + 1;
            UserGuest::where('id', $idGuest)->update([
                'attemps' => $attemp,
            ]);
        } elseif (Carbon::parse($date) > Carbon::parse('-24 hours')) {
            return 'Usted a sobrepasado el limite diaro de conversiones';
        }

        $amount = ($request->amount) ? ($request->amount) : (1);

        $apikey = 'd1ded944220ca6b0c442';

        $from_Currency = urlencode($request->from_currency);
        $to_Currency = urlencode($request->to_currency);
        $query =  "{$from_Currency}_{$to_Currency}";

        $json = file_get_contents("http://free.currencyconverterapi.com/api/v5/convert?q={$query}&compact=y&apiKey={$apikey}");

        $obj = json_decode($json, true);

        $val = $obj["$query"];

        $total = $val['val'] * 1;

        $formatValue = number_format($total, 2, '.', '');

        $data = "$amount $from_Currency = $to_Currency $formatValue";

        echo $data;
        die;
    }
    protected function rules()
    {
        $rules = [
            'emailGuest' => 'required|email',
        ];
        return $rules;
    }
}

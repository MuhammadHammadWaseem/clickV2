<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Code;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\Log;

class PayController extends Controller
{
    public function index($id)
    {
        session()->start();
        $eventId = GeneralHelper::getEventId();
        session(['event_id' => $eventId]);
        Log::info('Session data before redirect', ['event_id' => session('event_id')]);
        return view('Panel.dashboard.pay');
    }

    public function paydatas(Request $request)
    {

        $datas = Data::where('id_data', 1)->first();

        $subUsa = floatval($datas->subusa1 . '.' . $datas->subusa2);
        $tpsUsa = floatval($datas->tpsusa1 . '.' . $datas->tpsusa2);
        $tvqUsa = floatval($datas->tvqusa1 . '.' . $datas->tvqusa2);


        $subCA = floatval($datas->subcan1 . '.' . $datas->subcan2);
        $tpsCA = floatval($datas->tpscan1 . '.' . $datas->tpscan2);
        $tvqCA = floatval($datas->tvqcan1 . '.' . $datas->tvqcan2);

        $couponMsg;
        $discount = 0;
        $subUsao = 0;
        $subCAo = 0;

        if ($request->has('code')) {
            $code = Code::where('code', $request->code)->first();
            $code = DB::table('coupon')->where(['code' => $request->code])->get();
            //return $code[0]->discount;
            $current = Carbon::now();
            $dateNow = $current->format('Y-m-d');

            if ($code) {

                if ($dateNow >= $code[0]->start_date && $dateNow <= $code[0]->expirydate) {
                    $couponUsed = DB::table('events')->where(['coupon_code' => $request->code])->count();
                    if ($couponUsed < $code[0]->count) {
                        $discount = $code[0]->discount;

                        $subUsao = $subUsa;
                        $subCAo = $subCA;
                        $subUsa = $subUsa - ($subUsa / 100 * $code[0]->discount);
                        $subCA = $subCA - ($subCA / 100 * $code[0]->discount);
                        DB::table('events')->where(['id_event' => $request->idevent])->update(['coupon_code' => $request->code]);
                    } else {
                        $couponMsg = "Invalid Coupon";
                    }
                } else {
                    $couponMsg = "Invalid Coupon";
                }
            }
        } else {

            $discount = 0;
            $subUsao = 0;
            $subCAo = 0;
        }


        $totusa = number_format($subUsa + (($subUsa / 100) * $tpsUsa) + (($subUsa / 100) * $tvqUsa), 2);
        $totcan = number_format($subCA + (($subCA / 100) * $tpsCA) + (($subCA / 100) * $tvqCA), 2);


        $totusaexp = explode(".", $totusa);
        $totcanexp = explode(".", $totcan);

        $linkusa = "https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=info%40clickinvitation%2ecom&lc=EN&item_name=click%2dinvitation&amount=" . $totusaexp[0] . "%2e" . $totusaexp[1] . "&button_subtype=services&no_note=1&no_shipping=1&rm=1&return=https%3a%2f%2fclickinvitation%2ecom%2fevent%2f" . $request->idevent . "%2fthankyou%3famount=" . $totusaexp[0] . "." . $totusaexp[1] . "&currency_code=USD&bn=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHosted";

        $linkcan = "https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=info%40clickinvitation%2ecom&lc=EN&item_name=click%2dinvitation&amount=" . $totcanexp[0] . "%2e" . $totcanexp[1] . "&button_subtype=services&no_note=1&no_shipping=1&rm=1&return=https%3a%2f%2fclickinvitation%2ecom%2fevent%2f" . $request->idevent . "%2fthankyou%3famount=" . $totcanexp[0] . "." . $totcanexp[1] . "&currency_code=CAD&bn=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHosted";

        $newTvqUSA = number_format((($subUsa / 100) * $tvqUsa), 2, ".", "");
        $newTvqCA = number_format((($subCA / 100) * $tvqCA), 2, ".", "");

        $newTpsCan = number_format((($subCA / 100) * $tpsCA), 2, ".", "");
        $newTpsUSA = number_format((($subUsa / 100) * $tpsUsa), 2, ".", "");

        return '[{"subcan":"' . $subCA . ' CAD", "tpscan":"' . $newTpsCan . ' CAD", "tvqcan":"' . $newTvqCA . ' CAD", 
                  "subusa":"' . $subUsa . ' USD", "tpsusa":"' . $newTpsUSA . ' USD", "tvqusa":"' . $newTvqUSA . ' USD",
                  "totusa":"' . $totusa . ' USD","totcan":"' . $totcan . ' CAD", "linkcan":"' . $linkcan . ' CAD","linkusa":"' . $linkusa . ' CAD","discount":"' . $discount . '%","subusao":"' . $subUsao . ' USD","subcano":"' . $subCAo . ' CAD"}]';
    }

    public function payConfirm(Request $request)
    {
        $requestData = $request->all();
        Log::info('Session data after redirect', ['event_id' => session('event_id')]);
        return view('Panel.dashboard.paySucccess',compact("requestData"));

    }
}

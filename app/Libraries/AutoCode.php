<?php
/**
 * Created by PhpStorm.
 * User: aiph11
 * Date: 02/04/18
 * Time: 16:36
 */

namespace App\Libraries;


use Illuminate\Support\Facades\DB;

class AutoCode
{
    public static function lastCode($Parse, $Digit_Count)
    {
        $numbering = DB::table('numbering')->where('format', $Parse)->first();

        $NOL = "0";
        if (!$numbering) {
            $counter = 2;
            while ($counter < $Digit_Count):
                $NOL = "0" . $NOL;
                $counter++;
            endwhile;
            DB::table('numbering')->insert(['format' => $Parse, 'last_number' => 1]);
            return $Parse . $NOL . "1";
        } else {
            $L = $numbering->last_number + 1;
            DB::table('numbering')->where('format', $Parse)->update(['last_number' => $L]);
            while (strlen($L) != $Digit_Count) {
                $L = $NOL . $L;
            }
            return $Parse . $L;
        }
    }

}
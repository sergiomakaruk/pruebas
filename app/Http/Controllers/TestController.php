<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class TestController extends Controller
{
    public function eda(){

      //https://github.com/ixudra/curl

      $s = '__utma=187151037.1720457946.1521468213.1521468213.1521468213.1; __utmz=187151037.1521468213.1.1.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=(not%20provided); ASP.NET_SessionId=3i3cwuwmui2m51us51hird1f; AUTH-EDA=2E818D31A7F1A3D5995FF682E64B56C0B1537F24C16329DFD137F7574C2585619C46C1B52B01A1FDCD4B7807543DE78B7F863F56C028B047ADBC12A9518952572F1830A2627131183A9CEA549ABB3BBBBCF2B249A5DA02EEAC2088D7584BBFDB90699617';
    // Send a GET request to: http://www.foo.com/bar
    $response = Curl::to('http://www.dghpsh.agcontrol.gob.ar/EDA/Tramites/CEDyT/GetOblea/MjcwOTQ4Nw==')
        ->withHeaders( array( 'Cookie: '.$s ) )
        //->enableDebug('logFile.txt')
        //->withContentType('application/pdf')
        //->download('cert.pdf');
        ->get();

        $name = 'cert.pdf';

        return response()->make($response, 200, [
          'Content-Type' => 'application/pdf',
          'Content-Disposition' => 'inline; filename="'.$name.'"',
        ]);

        return response()->make($response, 200, [
          'Content-Type' => 'application/pdf',
          'Content-Disposition' => 'attachment; filename="'.$name.'"',
        ]);

    }
}

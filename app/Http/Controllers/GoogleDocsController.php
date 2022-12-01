<?php

namespace App\Http\Controllers;
use Google\Client;
use Google\Service\Drive;
use Exception;
use Google\Service\Sheets;
use Illuminate\Http\Request;
use App\Models\GoogleDoc;

class GoogleDocsController extends Controller
{
    //
    function getValues()
    {   
        $client = new Client();
        $client->setAuthConfig("macro.json");
        $client->addScope(Drive::DRIVE);
        $service = new Sheets($client);
        $spreadsheetId="1nrCYRDAfVNHrCAwvqz180xxewXecYhVvIwLom0Hwso0";
        $range="A1:H3";  //we can send the range from frontend but i put it here so as to reduce my effort
        $result = $service->spreadsheets_values->get($spreadsheetId, $range);
        try{
        $numRows = $result->getValues() != null ? count($result->getValues()) : 0;
       
        foreach ($result as $key => $value) {           
            $GoogleDoc=new GoogleDoc();
            $GoogleDoc->first_name=$value[0];
            $GoogleDoc->last_name=$value[1];
            $GoogleDoc->email=$value[2];
            $GoogleDoc->phone=$value[3];
            $GoogleDoc->address=$value[4];
            $GoogleDoc->pincode=$value[5];
            $GoogleDoc->aadhar=$value[6];
            $GoogleDoc->account_number=$value[7];
            $GoogleDoc->save();
        }
        return view('google');
       
    }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }
    public function googleDocs()
    {
        $result=GoogleDoc::get();
        return view('google_list',['data'=>$result]);
    }
}

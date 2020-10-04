<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

      public function SaveCaption(Request $request, $destinationPath)
    {
       
            
                $ext = 'vtt';
                // $ext = $caption[2]->getClientOriginalExtension();
                $fileName = 'vtt_' . date("Y-m-d") . '_' . time() . '.' . $ext;
                //---------
                $fileHandle = fopen($request->file('subtitle'), 'r');
                if ($fileHandle) {
                    $lines = array();
                    while (($line = fgets($fileHandle, 8192)) !== false) $lines[] = $line;
                    if (!feof($fileHandle)) exit("Error: unexpected fgets() fail\n");
                    else ($fileHandle);
                }
                $length = count($lines);
                for ($index = 1; $index < $length; $index++) {
                    if ($index === 1 || trim($lines[$index - 2]) === '') {
                        $lines[$index] = str_replace(',', '.', $lines[$index]);
                    }
                }
                for ($index = 0; $index < $length; $index++) {
                    $ttttt = trim($lines[$index]);
                    if (ctype_digit($ttttt)) {
                        echo 'n= ' . $index . ' is=' . $lines[$index] . '</br>';
                        $lines[$index] = '';
                    }
                }

                $header = "WEBVTT\n\n";
                $vttPath = "$destinationPath/$fileName";
                file_put_contents($vttPath, $header . implode('', $lines));
                //----------
                //$caption[2]->move(public_path($destinationPath), $fileName);
                // $vttPath = "$destinationPath/$fileName";
                return $vttPath;
              
            
        
    }

    public function delete_from_server($path)
    {
         // set up basic connection
        $conn = ftp_connect(env('FTP_HOST'));
        // login with username and password
        $login_result = ftp_login($conn, env('FTP_USERNAME'), env('FTP_PASSWORD'));
        // try to delete $file
        if (ftp_delete($conn, $path)) {
             ftp_close($conn);
           return true;
        } else {
             ftp_close($conn);
            return false;
        }
    
    }
}

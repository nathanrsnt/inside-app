<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class ScanController extends Controller
{
    //nmap
    public function showNmap() {
        return view('scans.nmap');
    }

    public function runNmap(Request $request) {
        $ipAddresses = explode(';', $request->input('ip'));
        $args = explode(' ', $request->input('checkedValues'));
        $allArgs = array('-p-', '-P', '-sV', '-T5', '-A', '-iR', '-sn', '-v');
        $cppPath = "../../bin/nmap_exec"; //change me
        $resultList = [];
        $validArgs = '';

        foreach ($args as $arg) {
            if (!in_array($arg, $allArgs)) {
                return response()->json(['error' => "Invalid arguments!"], 400);
            } else {
                $validArgs .= $arg . ' ';
            }
        }

        $wrappedArgs = '"'.trim($validArgs,'"').'"';


        foreach ($ipAddresses as $ip) {
            $command = sprintf("%s %s %s",$cppPath,$ip,$wrappedArgs);
            $result = Process::fromShellCommandline($command);

            $result->setTimeout(1200);

            try {
                $result->run();
            } catch (\Exception $e) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'output' => $e->getOutput(),
                ], 500);
            }

            $resultList[] = [
                'ip' => $ip,
                'output' => $result->getOutput(),
            ];
        }

        return response()->json($resultList);
    }

    public function showGobuster() {
        return view('scans.gobuster');
    }

    public function runGosbuter() {

    }
}

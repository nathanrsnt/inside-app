<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class ScanController extends Controller
{
    public function showNmap() {
        return view('scans.nmap');
    }

    public function runNmap(Request $request) {

        $resultList = [];
        $ipList = explode(';', $request->input('ip'));

        $args = '-sn ';

        $command = 'nmap ';

        foreach ($ipList as $ip) {
            $result = Process::fromShellCommandline($command . $args . $ip);
            $result->setTimeout(1200);
            $result->run();

            $resultList[] = [
                'ip' => $ip,
                'output' => $result->getOutput(),
            ];
        }

        return response()->json($resultList);
    }
}

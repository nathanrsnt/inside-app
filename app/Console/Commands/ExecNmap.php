<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExecNmap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exec:nmap {ip}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute a through Nmap scan (Noisy!)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $ip = $this->argument('ip');
        $command = "ifconfig";

        $this->info("Executando comando: $command");

        $output = [];
        $exitCode = -1;

        // Execute o comando
        exec($command, $output, $exitCode);

        $this->info("Código de saída: $exitCode");

        // Log de saída para referência
        Log::info('Saída do comando nmap: ' . implode(PHP_EOL, $output));
    }
}

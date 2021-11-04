<?php

namespace App\Console\Commands;

use App\Exports\UserExport;
use App\Http\Controllers\Api\UserController;
use Illuminate\Console\Command;
use Excel;
class ExportCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:to-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export file to CSV';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->exportFile();
    }
    public function exportFile()
    {
        $this->letGo();
        print ('be done');
    }
    public function letGo(){
        $export = new UserExport;
        return Excel::download($export,'userList.csv');
    }
}

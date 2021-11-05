<?php

namespace App\Console\Commands;

use App\Exports\UserExport;
use App\Http\Controllers\Api\UserController;
use App\User;
use Illuminate\Console\Command;
use Excel;
use Illuminate\Support\Facades\Response;
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
        $this->kaka();
        print ('be done');
    }
    public function letGo(){
//        $export = new UserExport;
//        return Excel::download($export,'userList.csv');
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
            ,   'Content-type'        => 'text/csv'
            ,   'Content-Disposition' => 'attachment; filename=galleries.csv'
            ,   'Expires'             => '0'
            ,   'Pragma'              => 'public'
        ];
        $list = User::all()->toArray();
        array_unshift($list, array_keys($list[0]));
        $callback = function() use ($list)
        {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) {
                fputcsv($FH, $row);
            }
            fclose($FH);
        };
        return Response::stream($callback, 200, $headers);
    }
    public function kaka(){
        return self::letGo();
    }
}

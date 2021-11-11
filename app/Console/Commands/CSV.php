<?php

namespace App\Console\Commands;

use App\Http\Repository\Model\UserRepository;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;
use mysql_xdevapi\Exception;
use phpDocumentor\Reflection\Types\This;

class CSV extends Command
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:from-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import CSV files';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function validate($list, $array,$check)
    {
        if($check==true){
            $users = User::whereIn('id', $array)->get();
            if (!empty($users[0])) {
                print('Duplicate id.Try Again');
                return false;
            }
            return true;
        }
        //check id must integer and name not empty
        if (ctype_digit($list[0]) && !empty($list[1])) {
            //check number of elements in id array, is last record of file csv or not
            if (sizeof($array) == 1000) {
                $users = User::whereIn('id', $array)->get();
                if (!empty($users[0])) {
                    print('Duplicate id.Try Again');
                    return false;
                }
            }
            //check format email of record
            if (!filter_var($list[2], FILTER_VALIDATE_EMAIL)) {
                print('Email wrong format!');
                return false;
            }
            return true;
        } else {
            print('id must be Integer and name not null!');
            return false;
        }
    }
    public function handle()
    {
        $time_pre = microtime(true);
        $path = storage_path('app/public/ListModel.csv');
        $handle = fopen($path, 'r');
        $array = [];
        $check = true;
        while ($var = fgetcsv($handle)) {
            $array[] = $var[0];
            if (!$this->validate($var, $array,false)) {
                return;
            }
            if (sizeof($array) == 1000) {
                $array = [];
            }
        }
        if(!empty($array)){
            if (!$this->validate($var, $array,true)) {
                return;
            }
        }
        DB::transaction(function () {
            LazyCollection::make(function () {
                $path = storage_path('app/public/ListModel.csv');
                $handle = fopen($path, 'r');
                while ($line = fgetcsv($handle)) {
                    yield $line;
                }
            })
                ->chunk(1000)
                ->each(function ($lines) {
                    $list = [];
                    foreach ($lines as $x) {
                        if (isset($x)) {
                            $list[] = [
                                "id" => $x[0],
                                "name" => $x[1],
                                "email" => $x[2],
                                "password" => $x[4],
                            ];
                        }
                    }
                    DB::table('users')->insert($list);
                });
        });
        $time_post = microtime(true);
        $exec_time = $time_post - $time_pre;
        print ('data be done in ');
        print ($exec_time);
    }
}

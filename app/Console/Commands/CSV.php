<?php

namespace App\Console\Commands;

use App\Http\Repository\Model\UserRepository;
use App\User;
use Illuminate\Console\Command;
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
//    public function __construct()
//    {
//        parent::__construct();
//    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = storage_path('app/public/MODEL.csv');
        $handle = fopen($path, 'r');
        while ($var = fgetcsv($handle)) {
            if (!$this->validate($var)) {
                return;
            }
        }
        LazyCollection::make(function () {
            $path = storage_path('app/public/MODEL.csv');
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
                        ];
                    }
                }
                User::insert($list);
            });
        print ('data be done!');
    }
    public function validate($list)
    {
        if (ctype_digit($list[0]) && !empty($list[1])) {
            $check=$this->userRepository->findById((int)$list[0]);
            if(empty($check)){
                if (!filter_var($list[2], FILTER_VALIDATE_EMAIL)) {
                    print('Email wrong format!');
                    return false;
                }
                return true;
            }else{
                print('Duplicate id.Try Again');
                return false;
            }
        } else {
            print('id must be Integer and name not null!');
            return false;
        }
    }
}

<?php

namespace App\Console\Commands;

use App\Http\Repository\Model\UserRepository;
use App\User;
use Illuminate\Console\Command;

class delateUserAtTime extends Command
{
    private $userRepository;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:delete-time';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete user automatic by time current';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository=$userRepository;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = getdate();
        $user=User::find($date['hours']);
        if(!empty($user)){
            User::find($date['hours'])->delete();
        }
        return 0;
    }
}

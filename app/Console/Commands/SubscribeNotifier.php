<?php

namespace App\Console\Commands;

use App\Matches;
use App\Teams;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SubscribeNotifier extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifier:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to subscribers';

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
     * @return mixed
     */
    public function handle()
    {
        $users_for_notify = null;
        $users = User::where('subscription_id', '<>', '0')->get(['name', 'email', 'subscription_id']);
        foreach ($users as $user) {
            $users_for_notify[$user->subscription_id] = ['name' => $user->name, 'email' => $user->email];
        }
        $matches = Matches::where('result', 'null')->where('is_notified', 'false')->
        whereRaw('curdate() BETWEEN (DATE(date) - INTERVAL 1 DAY) AND DATE(date)')->get()->toArray();
        if(empty($matches))
            return;
        foreach ($matches as $match) {
            if (!empty($users_for_notify[$match['team_one_id']])) {
                $user_email=$users_for_notify[$match['team_one_id']]['email'];
                $user_name=$users_for_notify[$match['team_one_id']]['name'];
                
                Mail::send('email.email', [
                    'first_team' => Teams::find($match['team_one_id'])->name,
                    'second_team' => Teams::find($match['team_two_id'])->name,
                    'date' => $match['date'],
                    'user_name'=>$users_for_notify[$match['team_one_id']]['name']

                ],
                    function ($message) use ($user_email,$user_name) {
                        $message->from('Football@sport.ua', 'FootballKozynets');
                        $message->to($user_email,$user_name);
                        $message->subject('Напоминание');

                    });
            } 
            if (!empty($users_for_notify[$match['team_two_id']])) {
                $user_email=$users_for_notify[$match['team_two_id']]['email'];
                $user_name=$users_for_notify[$match['team_two_id']]['name'];

                Mail::send('email.email', [
                    'first_team' => Teams::find($match['team_one_id'])->name,
                    'second_team' => Teams::find($match['team_two_id'])->name,
                    'date' => $match['date'],
                    'user_name'=>$users_for_notify[$match['team_two_id']]['name']

                ],

                    function ($message) use ($user_email,$user_name) {
                        $message->from('Football@sport.ua', 'FootballKozynets');
                        $message->to($user_email,$user_name);
                        $message->subject('Напоминание');

                    });
            }
            $final=Matches::find($match['id']);
            $final->is_notified=true;
            $final->save();
        }

    }
}

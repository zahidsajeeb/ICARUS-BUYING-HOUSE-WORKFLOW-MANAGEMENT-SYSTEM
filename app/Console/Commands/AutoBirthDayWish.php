<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Mail;
use App\Mail\BirthDayWish;


class AutoBirthDayWish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:birthdaywith';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];
        Mail::to('zahidsajeeb100@gmail.com')->send(new BirthDayWish($mailData));
    }
}

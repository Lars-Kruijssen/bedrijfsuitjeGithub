<?php

namespace App\Console\Commands;

use App\Models\Destination;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\TopDestinationsMail;

class MailTopDestinations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mail-top-destinations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mailt de top 5 bestemmingen met de meeste ja-stemmen naar admins.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Top 5 bestemmingen verzamelen...');

        $topDestinations = Destination::withCount([
            'votes as yes_votes' => fn($q) => $q->where('vote', true)
        ])
        ->orderByDesc('yes_votes')
        ->take(5)
        ->get();

        $admins = User::whereHas('role', fn($q) => $q->where('name', 'admin'))->get();

        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new TopDestinationsMail($topDestinations));
        }

        $this->info('E-mails verzonden naar admins');
    }
}

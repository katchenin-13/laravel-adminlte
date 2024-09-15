<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClientFacMail;

class SendReminderEmails extends Command
{
    protected $signature = 'emails:send-reminders';
    protected $description = 'Send reminder emails to clients one month after their registration';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $clients = Client::whereDate('registration_date', '=', now()->subMonth()->toDateString())->get();

        foreach ($clients as $client) {
            Mail::to($client->email)->send(new ClientFacMail($client));
        }
    }
}

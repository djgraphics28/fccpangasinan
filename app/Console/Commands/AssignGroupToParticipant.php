<?php

namespace App\Console\Commands;

use App\Models\Group;
use App\Models\Participant;
use Illuminate\Console\Command;

class AssignGroupToParticipant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:random-group';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Randomly assign participants to groups';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $participants = Participant::where('is_facilitator', false)->orderBy('church_id','ASC')->get();
        $groups = Group::all();

        if ($participants->isEmpty() || $groups->isEmpty()) {
            $this->error('No participants or groups found.');
            return;
        }

        foreach ($participants as $participant) {
            $randomGroup = $groups->random();

            // Attach the random group to the participant if not already assigned
            if (!$participant->groups->contains($randomGroup->id)) {
                $participant->groups()->attach($randomGroup->id);
                $this->info("Assigned Group ID {$randomGroup->id} to Participant ID {$participant->id}.");
            } else {
                $this->info("Participant ID {$participant->id} is already assigned to Group ID {$randomGroup->id}.");
            }
        }

        $this->info('Random assignment completed successfully.');
    }
}

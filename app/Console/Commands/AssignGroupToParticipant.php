<?php

namespace App\Console\Commands;

use App\Models\Group;
use App\Models\Participant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
    // public function handle()
    // {
    //     DB::table('participant_group')->truncate();

    //     $participants = Participant::where('is_facilitator', false)->orderBy('church_id','ASC')->get();
    //     $groups = Group::all();

    //     if ($participants->isEmpty() || $groups->isEmpty()) {
    //         $this->error('No participants or groups found.');
    //         return;
    //     }
    //     foreach($groups as $group) {
    //     foreach ($participants as $participant) {

    //             $participant->groups()->attach($group->id);

    //             $this->info("Participant ID {$participant->id} is already assigned to Group ID {$group->id}.");
    //         }
    //     }

    //     $this->info('Group assignment completed successfully.');
    // }

    public function handle()
    {
        DB::table('participant_group')->truncate();

        $participants = Participant::where('is_facilitator', false)
            ->orderBy('church_id', 'ASC')
            ->get();
        $groups = Group::all();

        if ($participants->isEmpty() || $groups->isEmpty()) {
            $this->error('No participants or groups found.');
            return;
        }

        $groupCount = $groups->count();
        foreach ($participants as $index => $participant) {
            // Assign each participant to a group based on their index
            $group = $groups[$index % $groupCount];
            $participant->groups()->attach($group->id);
            $this->info("Participant ID {$participant->id} is assigned to Group ID {$group->id}.");
        }

        $this->info('Group assignment completed successfully.');
    }


}

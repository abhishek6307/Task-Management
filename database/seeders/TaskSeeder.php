<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear any existing tasks
        DB::table('tasks')->truncate();

        // Sample task data
        $tasks = [
            [
                'title' => 'Finish Laravel Project',
                'description' => 'Complete the Laravel project for the client.',
                'status' => 'pending',
                'priority' => 'high',
                'due_date' => '2024-06-30',
                'user_id' => 1,
            ],
            [
                'title' => 'Buy Groceries',
                'description' => 'Need to buy milk, bread, and eggs.',
                'status' => 'completed',
                'priority' => 'medium',
                'due_date' => '2024-06-15',
                'user_id' => 2, 
            ],
            [
                'title' => 'Prepare Presentation',
                'description' => 'Prepare the slides for the upcoming meeting.',
                'status' => 'pending',
                'priority' => 'low',
                'due_date' => '2024-07-01',
                'user_id' => 1, 
            ],
            [
                'title' => 'Doctor Appointment',
                'description' => 'Visit the doctor for the annual check-up.',
                'status' => 'pending',
                'priority' => 'high',
                'due_date' => '2024-06-20',
                'user_id' => 2,
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}

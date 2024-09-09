<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Listing;

class DeleteOldListings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'listings:delete-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete listings older than 30 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the date 30 days ago
        $date = Carbon::now()->subDays(30);

        // Delete listings older than 30 days
        $oldListings = Listing::where('created_at', '<', $date)->delete();

        // Provide feedback on how many listings were deleted
        $this->info('Deleted ' . $oldListings . ' listings older than 30 days.');
    }
}

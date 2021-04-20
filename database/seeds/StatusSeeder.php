<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	$status = new Status();
        $status->name = "Unapproved";
        $status->save();

        $status = new Status();
        $status->name = "Approved";
        $status->save();

        $status = new Status();
        $status->name = "Not Approved";
        $status->save();

        $status = new Status();
        $status->name = "Public";
        $status->save();

        $status = new Status();
        $status->name = "Private";
        $status->save();

    }
}

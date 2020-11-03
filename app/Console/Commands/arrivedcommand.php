<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Models\Son;
use Carbon\Carbon;
use App\Models\School;
use App\Models\Arrival;


class arrivedcommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'arrival_commands';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $Sons = Son::where('Is_agree', 1)->get();


        foreach ($Sons as $item) {

            $date = Carbon::now();


            Arrival::create([
                'name_day_ar' => arabicDate($date->englishDayOfWeek),
                'name_day_en' => $date->englishDayOfWeek,
                'going' =>  $item->going,
                'timereturn' =>$item->timereturn,
                'transport_id' =>$item->transport_id,
                'school_id' => $item->school_id,
                'son_id' => $item->id,
                'date' => $date->toFormattedDateString(),

            ]);
            $date1 =Carbon::tomorrow('Europe/London');

            Arrival::create([
                'name_day_ar' => arabicDate($date1->englishDayOfWeek),
                'name_day_en' => $date1->englishDayOfWeek,
                'going' => $item->going,
                'timereturn' =>$item->timereturn,
                'transport_id' => $item->transport_id,
                'school_id' => $item->school_id,

                'son_id' => $item->id,
                'date' => $date1->toFormattedDateString(),

            ]);

        }

    }


}

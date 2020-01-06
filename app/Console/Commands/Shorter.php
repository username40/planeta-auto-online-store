<?php

namespace App\Console\Commands;

use App\Models\AutoModelShort;
use App\Models\AutoModel;
use Illuminate\Console\Command;

class Shorter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shorter';

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
     * @return mixed
     */
    public function handle()
    {
        $models = AutoModel::all();
        foreach ($models as $m) {
            $model = explode(' ', trim($m->description))[0];
            $mark = trim(explode($model, $m->full_description)[0]);

            // Склеиваем полное имя
            $full_unescaped = $mark ? "$mark $model" : $model;

            // Режем скобки
            $full = preg_replace('/(.*?) \(.*?\) (.*?)/i', '$1 $2', $full_unescaped);

            // Находим AutoModelShort по полному имени
            $ams = AutoModelShort::where('full_name', $full)->first();
            if($ams && ($ams->auto_mark_id != $m->auto_mark_id)){
                // Если марки не совпадают, то что-то пошло не так
                dump("Full: $full");
                dump("Old: $full_unescaped");
                dump('!!! CONFLICT !!!');
            }

            // Если по имени не нашли, то создаём
            if (!$ams) {
                $ams = new AutoModelShort();
                $ams->name = $model;
                $ams->full_name = $full;
                $ams->auto_mark_id = $m->auto_mark_id;
                $ams->save();
            }

            // Если у модельки нет ссылки на короткое имя, то присваиваем
            if ($m && !$m->auto_model_short_id) {
                $m->auto_model_short_id = $ams->id;
                $m->save();
//                $m->short_model()->save($ams);
            }
        }
    }
}

<?php

use App\Models\Meta;
use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allMetas = Meta::all();

        $twoMetas = $allMetas->reject(function($meta, $key){
            return $meta->id !== 3;
        });

        factory(Report::class, 2)->create()->each(function(Report $report) use ($twoMetas, $allMetas) {
            $metas = rand(0, 1) === 1 ? $allMetas : $twoMetas;

            foreach ($metas as $meta) {
                $data = ['meta_id' => $meta->id];
                $report->metas()->create($data);
            }
        });
    }
}

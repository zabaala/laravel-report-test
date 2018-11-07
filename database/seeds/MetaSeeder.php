<?php

use App\Models\Meta;
use Illuminate\Database\Seeder;

class MetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = (new \App\Services\Metas\GetAvailableMetasFromModel('website'))->run();

        foreach ($attributes as $attribute => $value) {
            $data = [
                'model' => 'website',
                'attribute' => $attribute,
                'label' => ucwords($attribute),
                'type' => $value
            ];

            (new Meta($data))->save();
        }
    }
}

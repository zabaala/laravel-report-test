<?php

namespace App\Repositories;

use App\Models\Website;

class DbWebsiteRepository
{
    /**
     * Get all available websites.
     *
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllAvailableWebsites($columns = ['*'])
    {
        return Website::all($columns);
    }
}

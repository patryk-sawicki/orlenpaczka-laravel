<?php

namespace PatrykSawicki\OrlenPaczkaApi\app\Classes;

use Illuminate\Support\Facades\Cache;

class GiveMeAllRUCHWithFilled extends Api
{
    /**
     * Get the list of items.
     *
     * @return array
     */
    public function list(): array
    {
        $cacheName = 'op_' . strtolower(self::class);

        return Cache::remember($cacheName, config('op.cache_time'), function () {
            return $this->postData('GiveMeAllRUCHWithFilled')['PointPwR'];
        });
    }
}
<?php

namespace PatrykSawicki\OrlenPaczkaApi\app\Classes;

use Illuminate\Support\Facades\Cache;

class GenerateLabelBusinessPack extends Api
{
    /**
     * Get the list of items.
     * @param array $data
     * @return mixed
     */
    public function pdf(array $data)
    {
        $cacheName = 'op_' . strtolower(self::class);

        return Cache::remember($cacheName, config('op.cache_time'), function () use ($data) {
            return base64_decode($this->postData('GenerateLabelBusinessPack', $data, 'LabelData')[0]);
        });
    }
}
<?php


namespace PatrykSawicki\OrlenPaczkaApi\app\Traits;

trait functions
{
    /**
     * Get request headers.
     *
     * @return array
     */
    protected function requestHeaders(): array
    {
        return [
            'Content-Type' => 'application/soap+xml',
        ];
    }
}

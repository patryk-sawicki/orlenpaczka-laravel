<?php

namespace PatrykSawicki\OrlenPaczkaTests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use PatrykSawicki\OrlenPaczkaApi\app\Classes\OrlenPaczka;
use PatrykSawicki\OrlenPaczkaTests\TestCase;

class GiveMeAllRUCHWithFilledTest extends TestCase
{
//    use DatabaseTransactions;

    public function testLoad()
    {
        $list = OrlenPaczka::giveMeAllRUCHWithFilled()->list();

        $this->assertTrue(!empty($list), 'Empty list');
        dd($list);
    }
}

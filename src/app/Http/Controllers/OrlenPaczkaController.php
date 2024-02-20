<?php

namespace PatrykSawicki\OrlenPaczkaApi\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PatrykSawicki\OrlenPaczkaApi\app\Classes\OrlenPaczka;
use Symfony\Component\HttpFoundation\StreamedResponse;

class OrlenPaczkaController extends Controller
{
    /**
     * @param Request $request
     * @param string $disc
     * @param string $dir
     * @param string $file
     * @return StreamedResponse
     */
    public function generateLabelBusinessPack(
        Request $request,
        string $disc = 'public',
        string $dir = 'labels',
        string $file = 'label'
    ) {
        $op = new OrlenPaczka();
        $pdf = $op->generateLabelBusinessPack()->pdf($request->op);
        Storage::disk($disc)->put($dir . '/' . $file . '.pdf', $pdf);
        return Storage::disk($disc)->download($dir . '/' . $file . '.pdf');
    }
}

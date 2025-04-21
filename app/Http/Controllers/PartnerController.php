<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\View\View;

class PartnerController extends Controller
{
    public function show(Partner $partner): View
    {
        return view('partners.show', compact('partner'));
    }
}

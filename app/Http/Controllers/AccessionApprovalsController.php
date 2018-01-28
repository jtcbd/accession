<?php

namespace App\Http\Controllers;

use App\Accession;
use Illuminate\Http\Request;

class AccessionApprovalsController extends Controller
{
    public function pending(Request $request)
    {
        $accessions = Accession::doesntHave('approvals')->with('classification')->latest()->get();

        return view('approval.pending', compact('accessions'));
    }

    public function approved(Request $request)
    {
        $accessions = Accession::has('approvals')->with('classification')->latest()->get();

        return view('approval.approved', compact('accessions'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Accession;
use App\Approval;
use App\Classification;
use App\Http\Filters\AccessionsFilter;
use Illuminate\Http\Request;

class AccessionsController extends Controller
{
    public function index(AccessionsFilter $filters)
    {
        $accessions = Accession::filter($filters)->with('classification')->latest()->paginate(8);
        $classifications = Classification::all();
        return view('accessions.index', compact('accessions', 'classifications'));
    }

    public function create()
    {
        return view('accessions.create');
    }

    public function store(Request $request)
    {
        $request['accession_date'] = $request->input('collection_date');
        $accession = Accession::create($request->all());

        return redirect()->route('accessions.show', [$accession])
            ->withSuccess('নতুন নিদর্শন সেভ করা হয়েছে |');
    }

    public function show(Request $request, Accession $accession)
    {
        $role = $request->user()->role_id;

        $approved = Approval::where('accession_id', $accession->id)
            ->where('role_id', $role)
            ->count();

        $accession->load('classification', 'approvals.role');
        return view('accessions.show', compact('accession', 'approved'));
    }

    public function approve(Request $request, Accession $accession)
    {
        $accession->approvals()->create([
            'role_id' => $request->user()->role_id,
            'status'  => $request->input('status'),
            'notes'   => $request->input('notes')
        ]);

        if ($request->user()->role_id == 4) {
            $accession->update([
                'status' => $request->input('status') == 3 ? true : false
            ]);
        }

        return back()
            ->withSuccess('নিদর্শনের জন্য আপনার মতামত প্রদান করা হয়েছে');
    }
}

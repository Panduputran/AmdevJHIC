<?php

namespace App\Http\Controllers\PublicPage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PublicPartnersController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('public.partners.index', compact('partners'));
    }

    public function show($id)
    {
        $partner = Partner::findOrFail($id);
        return view('public.partners.show', compact('partner'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\ContactRequest;
use App\Models\Page;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->first();

        return view('pages.show', compact('page'));
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * @param StoreContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeContact(StoreContactRequest $request)
    {
        $contact = new ContactRequest;
        $contact->fill($request->validated());
        $contact->save();

        return back()->with('message', 'Your inquiry has been sent.');
    }
}

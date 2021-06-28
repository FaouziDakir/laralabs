<?php

namespace App\Http\Controllers;

use App\Newsletter;
use App\Service;
use App\Mail;
use Illuminate\Http\Request;
use App\Mail\MailToNewsletter;

class NewsletterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('store');
    }

    public function index(Newsletter $newsletters)
    {
        $newsletters = Newsletter::all();

        return view('newsletter', compact('newsletters'));
    }

    public function sendMail(Newsletter $newsletters)
    {
        $attributes = request()->validate([
            'message' => 'required|min:1'
        ]);

        $newsletters = Newsletter::all()->pluck('email');

        \Mail::to($newsletters)->queue(
            new MailToNewsletter($attributes)
        );

        return back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Newsletter $newsletter)
    {
        $attributes = request()->validate([
            'email' => 'required|email'        
        ]);
        
        Newsletter::create($attributes);
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        //
    }
}

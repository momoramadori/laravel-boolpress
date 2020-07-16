<?php

namespace App\Http\Controllers;

use App\Mail\SendNewMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Lead;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function contatti()
    {
        return view('contatti');
    }

    public function contattiStore(Request $request)
    {
        $data = $request->all();
        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();
        Mail::to('admin@boolpress.it')->send(new SendNewMail($newLead));
        return redirect()->route('home');
    }


}

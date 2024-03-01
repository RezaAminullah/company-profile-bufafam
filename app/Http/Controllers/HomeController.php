<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\kontenhome;
use App\Models\service;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Logika untuk menampilkan view index dashboard
        return view('dashboard.home.index');
    }

    public function homepage()
    {
        // Logika untuk menampilkan data kartu di halaman utama
        $cards = Card::all();
        $kontenhomes = kontenhome::all();
        $services = service::all();
        $contacts = Contact::all();


        // Kembalikan view homepage dengan data yang sesuai
        return view('homepage', compact('cards','kontenhomes','services','contacts'));
    }

    
    // public function indexDashboard()
    // {
    //     $cards = Card::all();
    //     return view('homepage', compact('cards'));
    // }
}

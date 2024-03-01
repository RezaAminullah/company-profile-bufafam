<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::find(1); // Ambil informasi kontak dengan ID 1
        $contacts = Contact::all(); // Ambil semua kontak
        return view('dashboard.contact.index', compact('contact', 'contacts'));
    }

    public function indexDashboard()
    {
        $contacts = Contact::all();
        return view('contact', compact('contacts'));
    }

    public function show()
    {
        $contacts = Contact::all(); // Ambil semua data kontak dari model Contact

        return view('contact', ['contacts' => $contacts]);
    }

    public function create()
    {
        return view('dashboard.contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'emailperusahaan' => 'required|email',
            'notelperusahaan' => 'required|numeric',
            'alamatperusahaan' => 'required|string',
            'namacp1' => 'required|string',
            'nocp1' => 'required|numeric',
            'namacp2' => 'required|string',
            'nocp2' => 'required|numeric',
        ]);

        try {
            Contact::create([
                'emailperusahaan' => $request->emailperusahaan,
                'notelperusahaan' => $request->notelperusahaan,
                'alamatperusahaan' => $request->alamatperusahaan,
                'namacp1' => $request->namacp1,
                'nocp1' => $request->nocp1,
                'namacp2' => $request->namacp2,
                'nocp2' => $request->nocp2,
            ]);

            Session::flash('alert-success', 'Data kontak berhasil ditambahkan');
            return redirect()->route('dashboard.contact.index');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('dashboard.contact.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'emailperusahaan' => 'required|email',
            'notelperusahaan' => 'required|numeric',
            'alamatperusahaan' => 'required|string',
            'namacp1' => 'required|string',
            'nocp1' => 'required|numeric',
            'namacp2' => 'required|string',
            'nocp2' => 'required|numeric',
        ]);

        try {
            $contact = Contact::find($id);
            $contact->update([
                'emailperusahaan' => $request->emailperusahaan,
                'notelperusahaan' => $request->notelperusahaan,
                'alamatperusahaan' => $request->alamatperusahaan,
                'namacp1' => $request->namacp1,
                'nocp1' => $request->nocp1,
                'namacp2' => $request->namacp2,
                'nocp2' => $request->nocp2,
            ]);

            Session::flash('alert-success', 'Data kontak berhasil diperbarui');
            return redirect()->route('dashboard.contact.index');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $contact = Contact::find($id);
            $contact->delete();
            Session::flash('alert-success', 'Data kontak berhasil dihapus');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
        }

        return redirect()->route('dashboard.contact.index');
    }
 

public function getContactInfo()
{
    $contact = Contact::find(1); // Mengambil informasi kontak dengan ID 1
    return $contact;
}

}

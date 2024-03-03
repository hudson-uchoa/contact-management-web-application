<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function index() 
    {
        $contacts = Contact::all();
        
        return view('contacts.index', compact('contacts'));
    }
    
    public function create()
    {
        return view('contacts.store');
    }
    
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }
    
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|string|min:5',
                'contact' => 'required|numeric|digits:9',
                'email' => 'required|email|unique:contacts',
            ]);
    
            $contact = Contact::create($request->all());
    
            return redirect()->route('contacts.show', $contact->id)->with('success', 'Contact created successfully!');
        }catch(ValidationException $e){
            return back()->withErrors($e->validator->getMessageBag())->withInput();
        }catch(\Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
    
    public function edit(Request $request, Contact $contact)
    {
        return view('contacts.store', compact('contact'));
    }
    
    public function update(Request $request, Contact $contact)
    {
        //Lógica de atualizar
    }
    
    public function destroy(Contact $contact)
    {
        $contact->delete();
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }
}

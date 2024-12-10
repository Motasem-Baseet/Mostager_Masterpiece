<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $products = Product::all();
        // dd($);
        // Validate the form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:15',
            'category' => 'nullable|string|max:255',
        ]);

        // Prepare email data
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'category' => $request->input('category'),
            // 'message' => $request->input('message'),
        ];

        // Send the email
        Mail::send([], [], function ($message) use ($request) {
            $message->to('motasem.baseet@gmail.com')
                ->subject('New Contact Us Message')
                ->setBody(
                    "Name: {$request->name}\n" .
                    "Category: {$request->category}\n" .
                    "Phone: {$request->phone}\n" .
                    "Email: {$request->email}\n\n" .
                    "Message:\n{$request->message}"
                );
        });

        // Redirect back with success message
        return back()->with('success', 'Thank you for contacting us! Your message has been sent.');
    }
}

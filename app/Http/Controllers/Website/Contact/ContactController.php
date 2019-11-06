<?php

namespace App\Http\Controllers\Website\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactEmail;
use Mail;

class ContactController extends Controller
{
    public function showContactForm() {
    	return view('website.contact.contact');
    }

    public function sendEmail(Request $request) {
    	$request->validate([
    		'name'    => 'required',
            'email'   => 'required',
    		'phone'   => 'required',
    		'message' => 'required'
    	]);

    	$name = $request->input('name');
    	$email = $request->input('email');
    	$phone = $request->input('phone');
    	$message = $request->input('message');

    	$message = "<table border=\"1\">
    		<tr>
    			<th>Name : </th>
    			<td>$name</td>
    		</tr>
    		<tr>
    			<th>Email : </th>
    			<td>$email</td>
    		</tr>
    		<tr>
    			<th>Phone : </th>
    			<td>$phone</td>
    		</tr>
    		<tr>
    			<th>Message : </th>
    			<td>$message</td>
    		</tr>
    	</table>";

    	$data = ['message' => $message];
    	Mail::to('john@example.com')->send(new ContactEmail($data));

    	return redirect()->route('contact_form')->with('msg', 'Information has been sent');
    }
}

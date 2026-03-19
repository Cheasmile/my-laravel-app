<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
 
    public function welcome()
    {
       
        $bookings = Booking::latest()->get();
        return view('welcome', compact('bookings'));
    }

  
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'date' => 'required|date',
        'time' => 'required',
        'person' => 'required|integer',
    ]);

    Booking::create(attributes: $request->all());

   
    return back()->with('success', 'Booking created!');
}


    public function index()
    {
        $bookings = Booking::latest()->get();
        return view('admin.body.book', compact('bookings'));
    }
  
public function edit($id)
{
    $booking = Booking::findOrFail($id);
    $bookings = Booking::latest()->get();
    return view('admin.body.book', ['editBooking' => $booking, 'bookings' => $bookings]);
}



public function update(Request $request, $id)
{
    $booking = Booking::findOrFail($id);
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'date' => 'required|date',
        'time' => 'required',
        'person' => 'required|integer|min:1',
    ]);

    $booking->update($request->all());
    return redirect()->route('booking.index')->with('success', 'Booking updated successfully!');
}


public function destroy($id)
{
    $booking = Booking::findOrFail($id);
    $booking->delete();
    return redirect()->route('booking.index')->with('success', 'Booking deleted successfully!');
}

}

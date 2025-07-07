<?php

namespace App\Http\Controllers;

use App\Mail\PurchaseConfirmationMail;
use App\Models\Reservation;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $attr = $request->validate([
            'show_id' => ['required', Rule::exists(\App\Models\Show::class, 'id')],
            'selected_seats' => ['required', 'array'],
        ]);

        // Obtener usuario autenticado
        $user = auth()->user();

        // Crear reservas
        foreach ($attr['selected_seats'] as $seat) {
            Reservation::create([
                'show_id' => $attr['show_id'],
                'user_id' => $user->id,
                'seat_number' => $seat,
            ]);
        }

        // decrement the remaining_seats of the specific show
        $show = Show::find($attr['show_id']);
        $show->remaining_seats = $show->remaining_seats - sizeof($attr['selected_seats']);
        $show->save();

        // Enviar correo de confirmación
        $seats = $attr['selected_seats'];
        Mail::to($user->email)->send(new PurchaseConfirmationMail($user, $show, $seats));

        // return success
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        // increment show's remaining seats
        $reservation->show->remaining_seats++;
        $reservation->show->save();

        // delete reservation itself from db
        $reservation->delete();

        return redirect('dashboard')->with([
            'flash' => 'success',
            'message' => 'Successfully canceled your reservation. You will be refunded the ticket\'s amount.',
        ]);
    }
}

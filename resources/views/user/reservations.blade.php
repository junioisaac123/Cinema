<div class="container">
    <h1 class="mt-0 mb-0">My Reservations</h1>
    <hr>
    @if ($reservations->isNotEmpty())
        <table class="table table-responsive table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Movie</th>
                    <th scope="col">Show time</th>
                    <th scope="col">Seat number</th>
                    <th scope="col">Show price</th>
                    <!-- <th scope="col"></th> -->
                </tr>
            </thead>
            @foreach ($reservations as $reservation)
                <tr>
                    <th>{{ $reservation->show->movie->title }}</th>
                    <th>{{ $reservation->show->date->toDayDateTimeString() }}</th>
                    <td>{{ $reservation->seat_number }}</td>
                    <td>{{ $reservation->show->price . ' ' . config('app.currency') }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <div class="bg-light p-3 font-weight-bold rounded text-center">
            You don't have any future reservations.
        </div>
    @endif
</div>

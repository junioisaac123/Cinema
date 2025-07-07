@component('mail::message')
# ¡Gracias por tu compra, {{ $user->first_name }}!

Has reservado **{{ count($seats) }} asiento(s)** para el siguiente show:

- **Película:** {{ $show->movie->title }}
- **Fecha:** {{ $show->date }}
- **Hora:** {{ $show->start_time }} - {{ $show->end_time }}

@component('mail::panel')
Asientos seleccionados: {{ implode(', ', $seats) }}
@endcomponent

@component('mail::button', ['url' => config('app.url')])
Ver más en {{ config('app.name') }}
@endcomponent

¡Te esperamos!<br>
{{ config('app.name') }}
@endcomponent

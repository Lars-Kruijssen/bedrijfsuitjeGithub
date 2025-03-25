@component('mail::message')
    # Top 5 Bestemmingen

    Hier zijn de 5 populairste bestemmingen op basis van ja-stemmen:

    @foreach ($destinations as $destination)
        - **{{ $destination->name }}** – {{ $destination->yes_votes }} stemmen
    @endforeach

    Bedankt voor het stemmen!
@endcomponent

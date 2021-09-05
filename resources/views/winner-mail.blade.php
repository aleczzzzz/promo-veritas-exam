@component('mail::message')
# Winner

Congratulations {{$entry['firstname']}}! You won!

Thanks,<br>
{{$client->name}}
@endcomponent

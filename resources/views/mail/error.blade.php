@component('mail::message')
# An SMS was not sent.

<div>
    {{$data}}
</div>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

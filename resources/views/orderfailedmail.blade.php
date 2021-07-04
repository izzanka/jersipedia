@component('mail::message')
#   {{ $data['title'] }}

Your order ({{ $data['code'] }}) failed to be confirmed

@component('mail::button', ['url' => $data['url']])
View History
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

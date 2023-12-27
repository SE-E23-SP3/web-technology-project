@php
use App\Core\PasswordTools;
@endphp
<x-layouts.base {{ $attributes }}>
    <x-slot:head>
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
        <script defer src="{{ asset('js/qrcode.min.js') }}" type="text/javascript"></script>
        <script defer src="{{ asset('js/crypto.js') }}" type="text/javascript"></script>
        <script defer src="{{ asset('js/input-validator.js') }}" type="text/javascript"></script>
        <script defer src="{{ asset('js/error-container.js') }}" type="text/javascript"></script>
        <script defer src="{{ asset('js/form-utils.js') }}" type="text/javascript"></script>
        <script defer src="{{ asset('js/fieldscontainer.js') }}" type="text/javascript"></script>
        <script defer src="{{ asset('js/base32.js') }}" type="text/javascript"></script>
        <meta name="client-hash-site-constant" content="{{ PasswordTools::getClientSiteConstant() }}">
        {{ $head ?? null }}
    </x-slot:head>
    <div class="container-center">
        <div class="Center hidden error-container">
            <p class="error-message">
                An error has occured, try refreshing the page.
            </p>
            <button type="button" id="pageRefreshBtn">Refresh page now</button>
        </div>
        <article class="Center main-content">
            {{ $slot }}
        </article>
    </div>
</x-layouts.base>

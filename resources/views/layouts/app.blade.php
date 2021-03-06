<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="bootstrap" viewBox="0 0 118 94">
      <title>Bootstrap</title>
      <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
    </symbol>
    <symbol id="home" viewBox="2 0 28 28">
        <path d="M 16 2.59375 L 15.28125 3.28125 L 2.28125 16.28125 L 3.71875 17.71875 L 5 16.4375 L 5 28 L 14 28 L 14 18 L 18 18 L 18 28 L 27 28 L 27 16.4375 L 28.28125 17.71875 L 29.71875 16.28125 L 16.71875 3.28125 Z M 16 5.4375 L 25 14.4375 L 25 26 L 20 26 L 20 16 L 12 16 L 12 26 L 7 26 L 7 14.4375 Z"/>
    </symbol>
    <symbol id="hamburger" viewBox="0 0 32 32">
        <path d="M 4 7 L 4 9 L 28 9 L 28 7 Z M 4 15 L 4 17 L 28 17 L 28 15 Z M 4 23 L 4 25 L 28 25 L 28 23 Z"/>
    </symbol>
    <symbol id="speedometer2" viewBox="0 0 16 16">
      <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
      <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
    </symbol>
    <symbol id="table" viewBox="0 0 16 16">
      <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
    </symbol>
    <symbol id="people-circle" viewBox="0 0 16 16">
      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
    </symbol>
    <symbol id="grid" viewBox="0 0 16 16">
      <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
    </symbol>
    <symbol id="collection" viewBox="0 0 16 16">
      <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z"/>
    </symbol>
    <symbol id="calendar3" viewBox="0 0 16 16">
      <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
      <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
    </symbol>
    <symbol id="chat-quote-fill" viewBox="0 0 16 16">
      <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM7.194 6.766a1.688 1.688 0 0 0-.227-.272 1.467 1.467 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 5.734 6C4.776 6 4 6.746 4 7.667c0 .92.776 1.666 1.734 1.666.343 0 .662-.095.931-.26-.137.389-.39.804-.81 1.22a.405.405 0 0 0 .011.59c.173.16.447.155.614-.01 1.334-1.329 1.37-2.758.941-3.706a2.461 2.461 0 0 0-.227-.4zM11 9.073c-.136.389-.39.804-.81 1.22a.405.405 0 0 0 .012.59c.172.16.446.155.613-.01 1.334-1.329 1.37-2.758.942-3.706a2.466 2.466 0 0 0-.228-.4 1.686 1.686 0 0 0-.227-.273 1.466 1.466 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 10.07 6c-.957 0-1.734.746-1.734 1.667 0 .92.777 1.666 1.734 1.666.343 0 .662-.095.931-.26z"/>
    </symbol>
    <symbol id="cpu-fill" viewBox="0 0 16 16">
      <path d="M6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
      <path d="M5.5.5a.5.5 0 0 0-1 0V2A2.5 2.5 0 0 0 2 4.5H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2A2.5 2.5 0 0 0 4.5 14v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14a2.5 2.5 0 0 0 2.5-2.5h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14A2.5 2.5 0 0 0 11.5 2V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1V.5zm1 4.5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3A1.5 1.5 0 0 1 6.5 5z"/>
    </symbol>
    <symbol id="gear-fill" viewBox="0 0 16 16">
      <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
    </symbol>
    <symbol id="speedometer" viewBox="0 0 16 16">
      <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
      <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
    </symbol>
    <symbol id="toggles2" viewBox="0 0 16 16">
      <path d="M9.465 10H12a2 2 0 1 1 0 4H9.465c.34-.588.535-1.271.535-2 0-.729-.195-1.412-.535-2z"/>
      <path d="M6 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm.535-10a3.975 3.975 0 0 1-.409-1H4a1 1 0 0 1 0-2h2.126c.091-.355.23-.69.41-1H4a2 2 0 1 0 0 4h2.535z"/>
      <path d="M14 4a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/>
    </symbol>
    <symbol id="tools" viewBox="0 0 16 16">
      <path d="M1 0L0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"/>
    </symbol>
    <symbol id="chevron-right" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
    </symbol>
    <symbol id="geo-fill" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
    </symbol>
    <symbol id="video" viewBox="0 0 64 64">
        <path d="M42.4472008,36.1054993l-16-8c-0.3105011-0.1542988-0.6787014-0.1396999-0.9726009,0.0439014
		C25.1795998,28.3320007,25,28.6532993,25,29v16c0,0.3466988,0.1795998,0.6679993,0.4745998,0.8506012
		C25.6347008,45.9501991,25.8173008,46,26,46c0.1532993,0,0.3055992-0.0351982,0.4472008-0.1054993l16-8
		C42.7860985,37.7246017,43,37.3788986,43,37S42.7860985,36.2753983,42.4472008,36.1054993z M27,43.3818016V30.6182003
		L39.7635994,37L27,43.3818016z"/>
	<path d="M60,5h-56C1.7909007,5,0.0000008,6.7908001,0.0000008,9v46c0,2.2092018,1.7908999,4,3.9999998,4h56
		c2.2090988,0,4-1.7907982,4-4V9C64,6.7908001,62.2090988,5,60,5z M62,9v8h-8.3283005l2.6790009-10H60
		C61.1026993,7,62,7.8972001,62,9z M21.2804241,7l-2.6790009,10H9.6508007l2.6788998-10H21.2804241z M23.3507004,7h8.9297218
		l-2.6789989,10h-8.9297237L23.3507004,7z M34.3507004,7h8.9297218l-2.678997,10h-8.9297256L34.3507004,7z M45.3507004,7h8.9297218
		l-2.678997,10h-8.9297256L45.3507004,7z M4.0000005,7h6.2594237L7.5805006,17H2.0000007V9
		C2.0000007,7.8972001,2.8972008,7,4.0000005,7z M60,57h-56c-1.1027997,0-1.9999998-0.8972015-1.9999998-2V19h60v36
		C62,56.1027985,61.1026993,57,60,57z"/>
    </symbol>
    <symbol id="search-video" viewBox="0 0 512 512">
        <path d="M428.321,214.161C428.321,95.887,332.434,0,214.161,0S0,95.887,0,214.161s95.887,214.161,214.161,214.161
		c53.624,0,102.517-19.845,140.094-52.415L468.348,490L490,468.348L375.906,354.255
		C408.476,316.678,428.321,267.785,428.321,214.161z M214.161,397.696c-101.2,0-183.535-82.335-183.535-183.536
		S112.96,30.625,214.161,30.625s183.536,82.335,183.536,183.536S315.361,397.696,214.161,397.696z"/>
	    <path d="M157.244,314.794l170.933-100.879L157.244,113.037V314.794z M187.869,166.661l80.054,47.255l-80.054,47.254V166.661z"/>
    </symbol>
    <symbol id="will-view" viewBox="0 0 36 36">
        <path class="sketchy_een" d="M6.443,7.799C6.436,7.808,6.43,7.816,6.423,7.825C6.422,7.826,6.42,7.828,6.419,7.83
	C6.427,7.82,6.435,7.81,6.443,7.799z M6.171,8.152C6.19,8.128,6.208,8.104,6.227,8.079C6.25,8.05,6.272,8.02,6.295,7.99
	C6.254,8.044,6.212,8.098,6.171,8.152z M22.837,7.752c-0.01-0.008-0.02-0.015-0.03-0.023c0.013,0.01,0.027,0.021,0.04,0.031
	C22.844,7.758,22.841,7.755,22.837,7.752z M28.997,15.885c0.014,0.405-0.032,0.816-0.086,1.217c-0.058,0.439-0.117,0.886-0.22,1.316
	c-0.405,1.698-1.097,3.324-2.037,4.794c-0.247,0.385-0.526,0.745-0.807,1.106c-0.241,0.31-0.492,0.636-0.776,0.909
	c-0.63,0.607-1.329,1.125-2.094,1.552c-0.396,0.222-0.794,0.43-1.214,0.607c-0.384,0.16-0.776,0.301-1.172,0.43
	c-0.837,0.274-1.7,0.398-2.571,0.506c-0.803,0.097-1.61,0.18-2.42,0.173c-0.868-0.009-1.727-0.11-2.579-0.274
	c-0.789-0.153-1.601-0.295-2.352-0.587c-0.445-0.171-0.906-0.349-1.313-0.598c-0.328-0.202-0.646-0.414-0.958-0.641
	c-0.69-0.502-1.417-0.992-1.997-1.624C6.115,24.46,5.85,24.13,5.582,23.802C5.298,23.457,5,23.116,4.747,22.745
	c-0.245-0.356-0.484-0.717-0.677-1.104C3.866,21.233,3.7,20.804,3.54,20.377c-0.31-0.818-0.511-1.709-0.535-2.584
	c-0.022-0.841,0.025-1.684,0.119-2.519c0.056-0.488,0.128-0.971,0.24-1.45c0.094-0.396,0.209-0.803,0.353-1.183
	c0.317-0.834,0.701-1.633,1.127-2.413c0.411-0.75,0.866-1.469,1.383-2.149c0.065-0.085,0.131-0.17,0.196-0.255
	c0.134-0.171,0.27-0.34,0.409-0.508C7.399,6.62,8.127,6.088,8.847,5.559c0.655-0.481,1.378-0.902,2.123-1.232
	c0.268-0.121,0.538-0.234,0.814-0.34c0.176-0.068,0.362-0.14,0.547-0.185c0.448-0.114,0.895-0.196,1.356-0.247
	c0.313-0.033,0.627-0.05,0.941-0.05c0.115,0,0.231,0.002,0.347,0.007c0.551,0.023,1.095,0.092,1.642,0.167
	c0.025,0.003,0.049,0.009,0.074,0.018c0.112-0.061,0.24-0.098,0.357-0.084c0.555,0.065,1.1,0.162,1.637,0.312
	c0.421,0.115,0.832,0.258,1.246,0.396c0.821,0.272,1.633,0.56,2.364,1.034c0.728,0.47,1.45,0.958,2.121,1.509
	c0.618,0.504,1.228,1.012,1.774,1.597c0.315,0.339,0.628,0.699,0.879,1.091c0.227,0.351,0.423,0.719,0.594,1.098
	c0.376,0.837,0.717,1.698,0.962,2.582C28.864,14.094,28.965,14.993,28.997,15.885z M27.438,15.971
	c-0.003-0.315-0.039-0.628-0.078-0.939c-0.097-0.547-0.225-1.084-0.392-1.615c-0.144-0.464-0.332-0.916-0.518-1.366
	c-0.141-0.322-0.287-0.641-0.453-0.95c-0.164-0.308-0.347-0.596-0.549-0.876c-0.754-0.933-1.658-1.727-2.6-2.465
	c0.009,0.007,0.018,0.014,0.027,0.02c-0.012-0.01-0.025-0.019-0.038-0.029c-0.044-0.034-0.088-0.068-0.132-0.103
	c0.034,0.026,0.068,0.053,0.102,0.08c-0.722-0.555-1.464-1.118-2.295-1.497c-0.521-0.209-1.053-0.395-1.583-0.576
	c-0.605-0.206-1.226-0.384-1.859-0.478c-0.008-0.001-0.015-0.002-0.023-0.003c-0.104-0.013-0.199-0.029-0.287-0.061
	c-0.181,0.092-0.354,0.085-0.556,0.057c-0.044-0.007-0.087-0.013-0.132-0.019c-0.211-0.027-0.424-0.055-0.637-0.082
	c-0.234-0.031-0.477-0.027-0.713-0.04c-0.391-0.02-0.785,0.023-1.173,0.06c-0.273,0.046-0.553,0.087-0.815,0.175
	c-0.257,0.086-0.508,0.177-0.76,0.276c-0.483,0.224-0.949,0.468-1.406,0.741c-0.435,0.26-0.844,0.556-1.248,0.858
	C9.052,7.35,8.778,7.557,8.544,7.799C8.265,8.088,8.004,8.385,7.75,8.695c-0.439,0.583-0.849,1.181-1.206,1.818
	c-0.366,0.649-0.697,1.313-0.998,1.993c-0.302,0.763-0.535,1.547-0.678,2.357c-0.138,1.11-0.224,2.243-0.111,3.356
	c0.068,0.412,0.15,0.824,0.276,1.222c0.118,0.374,0.254,0.741,0.397,1.107c0.261,0.578,0.591,1.111,0.968,1.624
	c0.293,0.374,0.588,0.749,0.899,1.106c0.326,0.374,0.677,0.707,1.062,1.017c0.414,0.308,0.833,0.613,1.259,0.904
	c0.212,0.148,0.429,0.294,0.657,0.418c0.207,0.112,0.417,0.213,0.63,0.31c0.579,0.22,1.166,0.384,1.774,0.515
	c0.601,0.129,1.204,0.25,1.813,0.336c1.344,0.158,2.702,0.023,4.04-0.144c0.941-0.143,1.845-0.409,2.727-0.764
	c0.707-0.33,1.389-0.712,2.022-1.167c0.33-0.267,0.641-0.541,0.934-0.851c0.269-0.286,0.518-0.594,0.761-0.905
	c0.611-0.831,1.124-1.714,1.54-2.656c0.213-0.534,0.388-1.082,0.555-1.632c0.149-0.494,0.238-1.001,0.309-1.511
	C27.423,16.754,27.441,16.365,27.438,15.971z M20.349,12.77c-0.297-0.297-0.821-0.313-1.115,0c-0.074,0.08-0.139,0.168-0.205,0.256
	c-0.167,0.198-0.365,0.369-0.543,0.558c-0.267,0.283-0.538,0.562-0.816,0.836c-0.313,0.31-0.632,0.61-0.974,0.893
	c-0.049,0.041-0.098,0.082-0.147,0.123c-0.002-0.193-0.005-0.386-0.012-0.579c-0.023-0.646-0.07-1.293-0.081-1.939
	c-0.013-0.7-0.016-1.401,0-2.102c0.007-0.36,0.031-0.72,0.049-1.08c0.02-0.434,0.014-0.866,0-1.298
	c-0.014-0.47-0.38-0.863-0.863-0.863c-0.456,0-0.884,0.393-0.864,0.863c0.022,0.477,0.04,0.951,0.034,1.43
	c-0.005,0.393-0.02,0.785-0.034,1.179c-0.029,0.782-0.045,1.567-0.027,2.348c0.018,0.74,0.101,1.477,0.13,2.217
	c0.014,0.322,0.022,0.648,0.054,0.969c0.032,0.315,0.094,0.578,0.312,0.823c0.115,0.132,0.283,0.223,0.45,0.268
	c0.288,0.074,0.578-0.012,0.825-0.166c0.256-0.16,0.484-0.391,0.708-0.593c0.169-0.151,0.34-0.299,0.515-0.445
	c0.366-0.308,0.717-0.637,1.055-0.978c0.295-0.299,0.589-0.601,0.884-0.902c0.108-0.108,0.218-0.218,0.328-0.324
	c0.145-0.14,0.263-0.296,0.385-0.455C20.635,13.497,20.637,13.056,20.349,12.77z M20.409,13.797
	c-0.003,0.005-0.007,0.008-0.011,0.013c-0.002,0.003-0.003,0.006-0.006,0.009C20.398,13.811,20.403,13.804,20.409,13.797z
	 M20.349,13.885c0.019-0.02,0.026-0.045,0.043-0.067c-0.027,0.036-0.054,0.071-0.081,0.106
	C20.323,13.91,20.336,13.897,20.349,13.885z M7.004,16.224c-0.427,0-0.783,0.357-0.783,0.783c0,0.427,0.357,0.783,0.783,0.783
	s0.783-0.356,0.783-0.783C7.787,16.58,7.431,16.224,7.004,16.224z M15.876,23.756c-0.427,0-0.783,0.357-0.783,0.783
	s0.357,0.783,0.783,0.783c0.427,0,0.783-0.356,0.783-0.783S16.303,23.756,15.876,23.756z M24.766,16.385
	c-0.427,0-0.783,0.356-0.783,0.783s0.357,0.783,0.783,0.783c0.427,0,0.783-0.357,0.783-0.783S25.192,16.385,24.766,16.385z"/>
    </symbol>
    <symbol id="video-group" viewBox="0 0 64 64">
        <path d="M49.276,30.239c-1.164-1.163-3.057-1.163-4.221,0L29.664,45.63l-2.121,7.779l-0.519,0.519
		c-0.388,0.388-0.389,1.014-0.006,1.405l-0.005,0.02l0.019-0.005c0.194,0.191,0.446,0.288,0.699,0.288
		c0.256,0,0.512-0.098,0.707-0.293l0.52-0.52l7.778-2.121l15.39-15.391c1.164-1.164,1.164-3.058,0-4.222L49.276,30.239z
		 M31.973,46.15l10.243-10.243l4.243,4.243L36.216,50.393L31.973,46.15z M31.07,48.075l3.22,3.22l-4.428,1.208L31.07,48.075z
		 M50.711,35.896l-2.839,2.839l-4.243-4.242l2.839-2.839c0.385-0.385,1.01-0.384,1.394-0.001l2.85,2.85
		C51.096,34.887,51.096,35.513,50.711,35.896z"/>
        <path d="M37,25.365c0-0.342-0.175-0.66-0.463-0.844l-11-7c-0.308-0.195-0.698-0.208-1.019-0.033C24.199,17.664,24,18,24,18.365v14
            c0,0.365,0.199,0.701,0.519,0.877c0.15,0.082,0.316,0.123,0.481,0.123c0.187,0,0.374-0.053,0.537-0.156l11-7
            C36.825,26.025,37,25.707,37,25.365z M26,30.544V20.187l8.137,5.179L26,30.544z"/>
        <path d="M57,2.365H47H11H1c-0.552,0-1,0.447-1,1v11v11v11v11c0,0.553,0.448,1,1,1h10h12c0.552,0,1-0.447,1-1s-0.448-1-1-1H12v-10
            v-11v-11v-10h34v10v11c0,0.553,0.448,1,1,1h9v8c0,0.553,0.448,1,1,1s1-0.447,1-1v-9v-11v-11C58,2.813,57.552,2.365,57,2.365z
            M2,26.365h8v9H2V26.365z M10,24.365H2v-9h8V24.365z M2,46.365v-9h8v9H2z M10,13.365H2v-9h8V13.365z M56,4.365v9h-8v-9H56z
            M48,24.365v-9h8v9H48z"/>
    </symbol>
    <symbol id="watched" viewBox="0 0 512 512">
        <path d="m34,256l26.2,26.2c108,108 283.7,108 391.7,0l26.1-26.2-26.2-26.2c-108-108-283.7-108-391.7,0l-26.1,26.2zm222,126.2c-75.8,0-151.6-28.9-209.3-86.6l-32.9-32.9c-3.7-3.7-3.7-9.7 0-13.5l32.9-32.9c115.4-115.4 303.2-115.4 418.6,0l32.9,32.9c3.7,3.7 3.7,9.7 0,13.5l-32.9,32.9c-57.7,57.7-133.5,86.6-209.3,86.6z"/>
        <path d="m256,183.5c-40,0-72.5,32.5-72.5,72.5s32.5,72.5 72.5,72.5c40,0 72.5-32.5 72.5-72.5s-32.5-72.5-72.5-72.5zm0,164c-50.5,0-91.5-41.1-91.5-91.5 0-50.5 41.1-91.5 91.5-91.5s91.5,41.1 91.5,91.5c0,50.5-41,91.5-91.5,91.5z"/>
    </symbol>
    <symbol id="star" viewBox="0 0 64 64">
      <polygon style="fill:#EFCE4A;" points="26.934,1.318 35.256,18.182 53.867,20.887 40.4,34.013 43.579,52.549 26.934,43.798 10.288,52.549 13.467,34.013 0,20.887 18.611,18.182 "/>
    </symbol>
    <symbol id="timeee" viewBox="0 0 64 64">
      <path d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M30,58C14.561,58,2,45.439,2,30 S14.561,2,30,2s28,12.561,28,28S45.439,58,30,58z"/>
      <path d="M30,6c-0.552,0-1,0.447-1,1v23H14c-0.552,0-1,0.447-1,1s0.448,1,1,1h16c0.552,0,1-0.447,1-1V7C31,6.447,30.552,6,30,6z"/>
    </symbol>

    <symbol id="calendarr" viewBox="0 0 64 64">
      <path d="M58.963,44.119c-0.116-0.367-0.434-0.634-0.814-0.688l-7.777-1.089l-3.472-6.78c-0.342-0.668-1.438-0.668-1.779,0
      l-3.472,6.78l-7.777,1.089c-0.381,0.054-0.698,0.32-0.814,0.688s-0.012,0.768,0.269,1.031l5.605,5.267l-1.321,7.427
      c-0.066,0.373,0.084,0.752,0.388,0.978c0.305,0.227,0.711,0.262,1.049,0.089l6.964-3.528l6.964,3.528
      c0.143,0.073,0.298,0.108,0.452,0.108c0.211,0,0.421-0.066,0.597-0.197c0.304-0.226,0.454-0.604,0.388-0.978l-1.321-7.427
      l5.605-5.267C58.974,44.887,59.079,44.486,58.963,44.119z M51.325,49.33c-0.246,0.231-0.359,0.571-0.3,0.903l1.064,5.987
      l-5.628-2.852c-0.143-0.072-0.297-0.108-0.452-0.108s-0.31,0.036-0.452,0.108l-5.628,2.852l1.064-5.987
      c0.06-0.332-0.054-0.672-0.3-0.903l-4.479-4.207l6.225-0.872c0.322-0.045,0.603-0.244,0.751-0.534l2.818-5.504l2.818,5.504
      c0.148,0.29,0.429,0.489,0.751,0.534l6.225,0.872L51.325,49.33z"/>
    <path d="M36.01,32h9V21h-9h-2h-7h-2h-7h-2h-9v9v2v7v2v9h9h2h9v-9h9V32z M36.01,23h7v7h-7V23z M27.01,23h7v7h-7V23z M18.01,23h7v7
      h-7V23z M25.01,39h-7v-7h7V39z M9.01,23h7v7h-7V23z M9.01,32h7v7h-7V32z M16.01,48h-7v-7h7V48z M25.01,48h-7v-7h7V48z M34.01,39h-7
      v-7h7V39z"/>
    <path d="M26.01,55h-24V16h48v17c0,0.553,0.447,1,1,1s1-0.447,1-1V15V5c0-0.553-0.447-1-1-1h-5V1c0-0.553-0.447-1-1-1h-7
      c-0.553,0-1,0.447-1,1v3h-22V1c0-0.553-0.447-1-1-1h-7c-0.553,0-1,0.447-1,1v3h-5c-0.553,0-1,0.447-1,1v10v41c0,0.553,0.447,1,1,1
      h25c0.553,0,1-0.447,1-1S26.562,55,26.01,55z M39.01,2h5v3v3h-5V5V2z M8.01,2h5v3v3h-5V5V2z M2.01,6h4v3c0,0.553,0.447,1,1,1h7
      c0.553,0,1-0.447,1-1V6h22v3c0,0.553,0.447,1,1,1h7c0.553,0,1-0.447,1-1V6h4v8h-48V6z"/>
    </symbol>
    <symbol id="plus" viewBox="0 0 64 64">
      <path d="M24.0607 10L24.024 38" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M10 24L38 24" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
    </symbol>
    <symbol id="plus-scrap" viewBox="0 0 20 20">
      <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
    </symbol>
    <symbol id="watch-later-scrap" viewBox="0 0 100 100">
      <path d="M41.5,0C18.617,0,0.001,18.617,0.001,41.5c0,22.884,18.616,41.501,41.499,41.501C64.383,83.001,83,64.384,83,41.5
      C83,18.617,64.382,0,41.5,0z M41.5,77.001C21.926,77.001,6,61.075,6,41.5S21.925,6,41.5,6C61.075,6,77,21.925,77,41.5
      S61.075,77.001,41.5,77.001z"/>
      <path d="M53.508,45.32c-0.016,0-0.03,0-0.046,0L44.5,45.454V22c0-1.657-1.343-3-3-3s-3,1.343-3,3v26.5
        c0,0.006,0.002,0.012,0.002,0.018c0,0.01-0.002,0.019-0.002,0.027c0.002,0.122,0.025,0.237,0.041,0.354
        c0.01,0.073,0.011,0.148,0.025,0.22c0.027,0.129,0.072,0.249,0.115,0.37c0.022,0.063,0.036,0.129,0.062,0.189
        c0.052,0.123,0.122,0.235,0.189,0.35c0.031,0.051,0.054,0.107,0.087,0.157c0.076,0.111,0.167,0.21,0.257,0.311
        c0.038,0.042,0.069,0.09,0.109,0.131c0.097,0.096,0.206,0.177,0.315,0.26c0.044,0.033,0.083,0.073,0.128,0.104
        c0.118,0.08,0.247,0.143,0.376,0.205c0.045,0.021,0.085,0.051,0.131,0.07c0.15,0.063,0.31,0.107,0.472,0.146
        c0.03,0.007,0.058,0.021,0.089,0.027c0.194,0.039,0.395,0.061,0.601,0.061c0.015,0,0.031,0,0.046,0l12.008-0.18
        c1.656-0.025,2.979-1.389,2.955-3.045C56.483,46.634,55.144,45.32,53.508,45.32z"/>
    </symbol>
    <symbol id="group-scrap" viewBox="0 0 36 36">
      <path class="clr-i-outline clr-i-outline-path-1" d="M31,34H13a1,1,0,0,1-1-1V11a1,1,0,0,1,1-1H31a1,1,0,0,1,1,1V33A1,1,0,0,1,31,34ZM14,32H30V12H14Z"></path><rect class="clr-i-outline clr-i-outline-path-2" x="16" y="16" width="12" height="2"></rect><rect class="clr-i-outline clr-i-outline-path-3" x="16" y="20" width="12" height="2"></rect><rect class="clr-i-outline clr-i-outline-path-4" x="16" y="24" width="12" height="2"></rect><path class="clr-i-outline clr-i-outline-path-5" d="M6,24V4H24V3a1,1,0,0,0-1-1H5A1,1,0,0,0,4,3V25a1,1,0,0,0,1,1H6Z"></path><path class="clr-i-outline clr-i-outline-path-6" d="M10,28V8H28V7a1,1,0,0,0-1-1H9A1,1,0,0,0,8,7V29a1,1,0,0,0,1,1h1Z"></path>
    </symbol>
    <symbol id="history" viewBox="0 0 18 18">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M13.507 12.324a7 7 0 0 0 .065-8.56A7 7 0 0 0 2 4.393V2H1v3.5l.5.5H5V5H2.811a6.008 6.008 0 1 1-.135 5.77l-.887.462a7 7 0 0 0 11.718 1.092zm-3.361-.97l.708-.707L8 7.792V4H7v4l.146.354 3 3z"/>
    </symbol>
    <symbol id="filters" viewBox="0 0 24 24">
      <path d="M9 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM6.17 5a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-7.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 0 1 0-2h1.17zM15 11a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2.83 0a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-1.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 1 1 0-2h7.17zM9 17a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2.83 0a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-7.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 1 1 0-2h1.17z" fill="#fff"/>
    </symbol>
  </svg>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm fixed-top" style="background:rgba(33, 33, 33, 0.99);">
          <button id="hamburger-button" class="hamburger" style="border:0; background:transparent; margin-left:15px;"><svg class="bi" width="28" height="28" role="img" aria-label="Products"><use xlink:href="#hamburger"/></svg></button>
          <a class="navbar-brand text-white" style="margin-left:30px;" href="{{ url('/') }}">
              {{ config('app.name', 'Laravel') }}
          </a>
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav me-auto">

              </ul>
              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ms-auto">
                  <!-- Authentication Links -->
                  @guest
                      @if (Route::has('login'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">Logowanie</a>
                          </li>
                      @endif

                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">Rejestracja</a>
                          </li>
                      @endif
                  @else
                      <li class="nav-item dropdown" style="margin-right:35px;">
                          <a href="#" class="d-flex align-items-center text-white text-decoration-none avatar" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="width:40px; height:40px;">
                              @if(session('avatar'))
                                <img src="{{asset('storage/'.session('avatar'))}}" alt="" class="rounded-circle me-2" style="width:100%; height:100%;">
                              @else
                                <div class="rounded-circle" style="width:100%; height:100%; text-align:center; line-height:40px; background:brown; font-size:20px; font-weight:600;">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                              @endif
                          </a>
                          
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="background:rgba(33, 33, 33, 0.99);">
                            <a class="dropdown-item text-white" href="{{ route('createMovie') }}">Dodaj film</a>
                           <!-- Button trigger add group modal -->
                           <button type="button" class="dropdown-item text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Dodaj grup??
                          </button>
                          <a class="dropdown-item text-white" href="{{ route('profile') }}" style="border-bottom: 1px solid rgba(255, 255, 255, 0.79)">Profil</a>
                          
                              <a class="dropdown-item text-white" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                  Wyloguj
                              </a>
                               
                                

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
              </ul>
          </div>
        </nav>

        <div id="small-left-menu" class="d-flex flex-column flex-shrink-0" style="width: 4.5rem; padding-top:4rem; height:100vh; position:fixed; background:#212121;">
            <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
              <li>
                <a href="{{ route('home') }}" class="nav-link py-3 {{  request()->routeIs('home') ? 'active' : '' }} {{  (request()->is('home/*')) ? 'active' : '' }}" aria-current="page" title="G????wna" data-bs-toggle="tooltip" data-bs-placement="right">
                  <svg class="bi" width="24" height="24" role="img" aria-label="G????wna"><use xlink:href="#home"/></svg>
                </a>
              </li>
              <li>
                <a href="{{ route('viewScrapMovies') }}" class="nav-link py-3 {{  request()->routeIs('viewScrapMovies') ? 'active' : '' }}" title="Wyszukaj" data-bs-toggle="tooltip" data-bs-placement="right">
                  <svg class="bi" width="28" height="28" role="img" aria-label="Wyszukaj"><use xlink:href="#search-video"/></svg>
                </a>
              </li>
              <li>
                <a href="{{ route('filters') }}" class="nav-link py-3 {{  request()->routeIs('filters') ? 'active' : '' }}" title="FIltry" data-bs-toggle="tooltip" data-bs-placement="right">
                    <svg class="bi" width="32" height="32" role="img" aria-label="Filtry"><use xlink:href="#filters"/></svg>
                </a>
              </li>
              <li>
                <a href="{{ route('library') }}" class="nav-link py-3 {{  request()->routeIs('library') ? 'active' : '' }}" title="Biblioteka" data-bs-toggle="tooltip" data-bs-placement="right">
                  <svg class="bi" width="28" height="28" role="img" aria-label="Biblioteka"><use xlink:href="#video"/></svg>
                </a>
              </li>
            </ul>
            <div class="dropdown">
              <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
              
              </ul>
            </div>
        </div>
        <div id="big-left-menu" class="flex-shrink-0 text-white" style="display:none!important;">
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link text-white nav-left-flex {{  request()->routeIs('home') ? 'active' : '' }}" aria-current="page">
                <svg class="bi me-2" width="26" height="26"><use xlink:href="#home"/></svg>
                  <span style="margin-top:3px;">G????wna</span>
              </a>
            </li>
            {{ (request()->is('admin/cities')) ? 'active' : '' }}
            <li class="{{ (request()->is('admin/cities*')) ? 'active' : '' }}">  

            
            <li class="nav-item" style="margin:5px 0 0 0;">
              <a href="{{ route('viewScrapMovies') }}" class="nav-link text-white nav-left-flex {{  request()->routeIs('viewScrapMovies') ? 'active' : '' }}">
                <svg class="bi me-2" width="26" height="26"><use xlink:href="#search-video"/></svg>
                  <span style="margin-top:3px;">Wyszukaj</span>
              </a>
            </li>
            <li style="margin:5px 0 5px 0;">
              <a href="{{ route('filters') }}" class="nav-link text-white nav-left-flex {{  request()->routeIs('filters') ? 'active' : '' }}">
                <svg class="bi me-2" width="26" height="26"><use xlink:href="#filters"/></svg>
                  <span style="margin-top:3px;">Filtry</span>
              </a>
            </li>
            <hr>
            <li>
              <a href="{{ route('library') }}" class="nav-link text-white nav-left-flex {{  request()->routeIs('library') ? 'active' : '' }}">
                <svg class="bi me-2" width="28" height="28"><use xlink:href="#video"/></svg>
                  <span style="margin-top:3px;">Biblioteka</span>
              </a>
            </li> 
            @foreach ($userGroups as $uGroup)
              @continue($uGroup->type == "user")
              <li>
                <a href="{{route('groupShow', ['id' => $uGroup->id])}}" class="nav-link text-white nav-left-flex {{ (request()->is('grupa/szczegoly/'.$uGroup->id)) ? 'active' : '' }}">
                  <svg class="bi me-2" width="28" height="28"><use xlink:href="#will-view"/></svg>
                  <span style="margin-top:3px;">
                  @if ($uGroup->name == "Wszystkie filmy")
                    Historia
                  @elseif($uGroup->name == "Do obejrzenia")
                    Do obejrzenia
                  @endif
                  </span>
                </a>
              </li>
            @endforeach
            @foreach ($userGroups as $uGroup)
              @continue($uGroup->type == "default")
              <li>
                <a href="{{route('groupShow', ['id' => $uGroup->id])}}" class="nav-link text-white nav-left-flex {{ (request()->is('grupa/szczegoly/'.$uGroup->id)) ? 'active' : '' }}">
                  <svg class="bi me-2" width="28" height="28"><use xlink:href="#video-group"/></svg>
                    <span style="margin-top:3px;">{{ $uGroup->name }} </span>
                </a>
              </li>
            @endforeach
          </ul>
          <div class="mobile-right-menu" style="display:none;">
              <a class="dropdown-item text-white" href="{{ route('createMovie') }}">Dodaj film</a>
              <!-- Button trigger add group modal -->
              <button type="button" class="dropdown-item text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Dodaj grup??
              </button>
              <a class="dropdown-item text-white" href="{{ route('profile') }}" style="border-bottom: 1px solid rgba(255, 255, 255, 0.79)">Profil</a>
              <a class="dropdown-item text-white" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  Wyloguj
              </a>
          </div>
        </div>
        
          <!-- Add group modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" style="background: #212121; color:#fff;">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Nowa grupa</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('addGroup') }}">
                  @csrf
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="name-group" class="form-label">Nazwa grupy</label>
                      <input type="text" name="name" maxlength="50" class="form-control" id="name-group" placeholder="Nazwa grupy" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                    <button type="submit" class="btn btn-primary">Dodaj grup??</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        <main class="global-contener">
            @yield('content')
        </main>
        
        @livewireScripts
        @stack('script')
    </div>
</body>
</html>

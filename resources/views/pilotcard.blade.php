<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="/js/jquery-3.1.1.min.js" defer></script>


    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#0f2a7c">
    <meta name="msapplication-TileColor" content="#0f2a7c">
    <meta name="theme-color" content="#0f2a7c">

    <!-- Styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/font-awesome.css" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'GothamBold';
            src: url('/fonts/GothamBold.eot');
            src: url('/fonts/GothamBold.eot') format('embedded-opentype'),
            url('/fonts/GothamBold.woff2') format('woff2'),
            url('/fonts/GothamBold.woff') format('woff'),
            url('/fonts/GothamBold.ttf') format('truetype'),
            url('/fonts/GothamBold.svg#GothamBold') format('svg');
        }
        @font-face {
            font-family: 'AurebeshBold';
            src: url('/fonts/AurebeshBold.eot');
            src: url('/fonts/AurebeshBold.eot') format('embedded-opentype'),
            url('/fonts/AurebeshBold.woff2') format('woff2'),
            url('/fonts/AurebeshBold.woff') format('woff'),
            url('/fonts/AurebeshBold.ttf') format('truetype'),
            url('/fonts/AurebeshBold.svg#AurebeshBold') format('svg');
        }


        body {
            background-color: #000;
            font-family: GothamBold, sans-serif;
        }

        main {
            background-image: url('/images/pilot-card-bg.png');
            background-size: cover;
            border: calc(99vh * 0.02) solid #1347df;
            border-radius: calc(99vh * 0.1);
            box-shadow: 0 0 0 calc(99vh * 0.00925925925925925925925925925926) #cdd9eb inset;
            color: #cdd9eb;
            display: flex;
            flex-direction: column;
            margin: auto;
            height: 99vh;
            width: calc(99vh * 0.66666666666666666666666666666667);
            padding: calc(99vh * 0.01);
        }
        img {
            max-width: 100%;
            max-height: 100%;
        }
        main figure:first-child {
            max-height: calc(99vh * 0.20833333333333333333333333333333);
            text-align: center;
            margin: 0;
        }
        h1, h2 {
            color: #ff0;
            text-align: center;
            margin: 0;
            overflow: hidden;
            white-space: pre;
            text-overflow: ellipsis;
        }
        h1 {
            font-size: calc(99vh * 0.0662962962962962962962962962963);
            text-transform: uppercase;
        }
        h2 {
            font-size: calc(99vh * 0.035);
            font-family: AurebeshBold, sans-serif;
            text-transform: lowercase;
        }
        h3, h4 {
            text-align: center;
            margin: 0;
            overflow: hidden;
            white-space: pre;
            text-overflow: ellipsis;
        }
        h3 {
            font-size: calc(99vh * 0.04);
            text-transform: uppercase;
        }
        h4 {
            font-size: calc(99vh * 0.02);
            font-family: AurebeshBold, sans-serif;
            text-transform: lowercase;
        }
        main figure:last-child {
            max-height: calc(99vh *0.12407407407407407407407407407407);
            text-align: center;
        }
        table td:first-child {
            background-color: transparent;
            color: inherit;
            font-size: calc(99vh * 0.03);
            width: 33%;
        }
        table td {
            background-color: rgba(240, 240, 255, 0.4);
            color: #000723;
            font-size: calc(99vh * 0.036);
            width: 25%;
            padding: calc(99vh * 0.009) calc(99vh * 0.022);
        }
        table th {
            font-size: calc(99vh * 0.02962);
            font-weight: normal;
            padding: calc(99vh * 0.007) calc(99vh * 0.02);
        }
    </style>
</head>
<body>
<script>
    let query = "INSERT INTO `cards` (`id`,`season`,`pilotname`,`team`,`team_image`,`nr_k`,`nr_d`,`nr_a`,`nr_w`,`nr_kd`,`ge_k`,`ge_d`,`ge_a`,`ge_w`,`ge_kd`,`t_kd`,`created_at`,`updated_at`) VALUES (NULL,'proto-0','{{ $pilot->pilot_name }}','{{ $team->team_name }}','{{ $team->logo != '' ? $team->logo : 'default.png' }}','{{ $nrStat['kills'] }}','{{ $nrStat['deaths'] }}','{{ $nrStat['assists'] }}','{{ $nrStat['wins'] }}','{{ number_format($nrStat['kills'] / ($nrStat['deaths'] != 0 ? $nrStat['deaths'] : 1), 2) }}','{{ $eStat['kills'] }}','{{ $eStat['deaths'] }}','{{ $eStat['assists'] }}','{{ $eStat['wins'] }}','{{ number_format($eStat['kills'] / ($eStat['deaths'] != 0 ? $eStat['deaths'] : 1), 2) }}','{{ number_format(($nrStat['kills'] + $eStat['kills']) / (($nrStat['deaths'] + $eStat['deaths']) != 0 ? ($nrStat['deaths'] + $eStat['deaths']) : 1), 2) }}',NULL,NULL); ";

    console.log(query);
</script>
<main>
    <figure>
        <img src="/images/teams/{{ $team->logo != '' ? $team->logo : 'default.png' }}" alt="{{ $team->team_name }} logo">
    </figure>
    <h1>{{ $pilot->pilot_name }}</h1>
    <h2>{{ $pilot->pilot_name }}</h2>
    <h3>{{ $team->team_name }}</h3>
    <h4>{{ $team->team_name }}</h4>
    <table>
        <tr>
            <th></th>
            <th>NR</th>
            <th>GE</th>
            <th>TOTAL</th>
        </tr>
        <tr>
            <td>KILLS</td>
            <td>{{ $nrStat['kills'] }}</td>
            <td>{{ $eStat['kills'] }}</td>
            <td>{{ $eStat['kills'] + $nrStat['kills'] }}</td>
        </tr>
        <tr>
            <td>DEATHS</td>
            <td>{{ $nrStat['deaths'] }}</td>
            <td>{{ $eStat['deaths'] }}</td>
            <td>{{ $eStat['deaths'] + $nrStat['deaths'] }}</td>
        </tr>
        <tr>
            <td>ASSISTS</td>
            <td>{{ $nrStat['assists'] }}</td>
            <td>{{ $eStat['assists'] }}</td>
            <td>{{ $eStat['assists'] + $nrStat['assists'] }}</td>
        </tr>
        <tr>
            <td>WINS</td>
            <td>{{ $nrStat['wins'] }}</td>
            <td>{{ $eStat['wins'] }}</td>
            <td>{{ $eStat['wins'] + $nrStat['wins'] }}</td>
        </tr>
        <tr>
            <td>K/D</td>
            <td>{{ number_format($nrStat['kills'] / ($nrStat['deaths'] != 0 ? $nrStat['deaths'] : 1), 2) }}</td>
            <td>{{ number_format($eStat['kills'] / ($eStat['deaths'] != 0 ? $eStat['deaths'] : 1), 2) }}</td>
            <td>{{ number_format(($nrStat['kills'] + $eStat['kills']) / (($nrStat['deaths'] + $eStat['deaths']) != 0 ? ($nrStat['deaths'] + $eStat['deaths']) : 1), 2) }}</td>
        </tr>
    </table>
    <figure>
        <img src="/images/logo.png" alt="">
    </figure>
</main>
</body>

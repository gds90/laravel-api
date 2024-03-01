@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <div class="logo_laravel">
                <img src="./img/logo1.png" alt="My Projects" class="">
            </div>
            <h1 class="display-5 fw-bold">
                Welcome to My Projects
            </h1>

            <p class="col-md-8 fs-4">Concepito da sviluppatori per sviluppatori: il software di gestione perfetto per
                migliorare la produttività e il successo del tuo team.</p>
            <a href="https://packagist.org/packages/pacificdev/laravel_9_preset" class="btn btn-danger btn-lg"
                type="button">Documentazione</a>
        </div>
    </div>

    <div class="content rounded-3 bg-light ">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <img src="/img/team.jpg" alt="Team" class="w-100 rounded-3 shadow ">
                </div>
                <div class="col-lg-4 col-md-12 pt-5">
                    <h2 class="text-danger"><strong>Massimizza l'efficienza del tuo team con il nuovo gestionale per
                            progetti
                            informatici</h2></strong>
                    <p class="fs-5">Ottimizza la pianificazione, la collaborazione e il monitoraggio dei progetti
                        informatici con il
                        nostro innovativo software gestionale. Con funzionalità intuitive e strumenti avanzati, potrai
                        gestire risorse, tenere traccia dei progressi e garantire la tempestiva consegna dei progetti, il
                        tutto con un'unica piattaforma integrata.</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4 col-md-12 pt-5">
                    <h2 class="text-danger"><strong>Trasforma la tua visione in realizzazione con il nostro gestionale per
                            progetti
                            informatici</h2></strong>
                    <p class="fs-5">Dall'ideazione alla consegna, il nostro gestionale per progetti informatici ti offre
                        il supporto necessario per trasformare le tue idee in successi tangibili. Grazie a strumenti
                        sofisticati di gestione delle attività e di collaborazione, potrai coordinare il lavoro del tuo team
                        in modo efficiente, garantendo risultati impeccabili in ogni fase del ciclo di vita del progetto.
                    </p>
                </div>
                <div class="col-lg-8 col-md-12">
                    <img src="/img/developer.jpg" alt="Developer" class="w-100 rounded-3 shadow">
                </div>
            </div>
        </div>
    </div>
@endsection

21.02.24
Esercizio di oggi: Laravel Boolfolio - Base
nome repo: [laravel-auth]
Ciao ragazzi,
creiamo con Laravel il nostro sistema di gestione del nostro Portfolio di progetti.
Oggi iniziamo un nuovo progetto che si arricchirà nel corso delle prossime lezioni: man mano aggiungeremo funzionalità e vedremo la nostra applicazione crescere ed evolvere.
Nel pomeriggio, rifate ciò che abbiamo visto insieme stamattina stilando tutto a vostro piacere utilizzando SASS.
Descrizione:
Ripercorriamo gli steps fatti a lezione ed iniziamo un nuovo progetto usando laravel breeze ed il pacchetto Laravel 9 Preset con autenticazione.
Ricordatevi i passaggi visti a lezione:
1 - Creo il progetto;
2 - Installo laravel breeze;
3 - Installo il preset
4 - Installo bootstrap con l'auth
5 - Creo il controller per la dashboard admin (Admin/DashboardController) e modifico il file della web.php
6 - Modifico la costante home in RouteServiceProvider.
Proseguite poi con il definire il layout, modello, migrazione, controller e rotte necessarie per il sistema portfolio:
1. Creazione del modello Project con relativa migrazione, seeder, controller e rotte
2. Per la parte di back-office creiamo un resource controller Admin\ProjectController per gestire tutte le operazioni CRUD dei progetti
Eseguite un passaggio per volta, non preoccupatevi molto della grafica al momento, potete lasciare quella di default. Occupatevene in un secondo momento.
L'esercizio viene considerato svolto se fate anche le rotte index e show per i progetti.
Bonus:
Personalizzare la grafica del gestionale.

22.02.24:
continuate con l'esercizio di ieri (stessa repo) facendo le crud rimanenti. Per la cancellazione è considerato esercizio base se la fate con la confirm all'onsubmit.

BONUS: create una modale con cui chiedere conferma della cancellazione. Scegliete uno dei due metodi per visti a lezione.
Buon lavoro

26.02.24:
sercizio di oggi:
Laravel Boolfolio - Cover Image
nome repo: [laravel-auth]
Ciao ragazzi, continuiamo a lavorare nella repo dei giorni scorsi e aggiungiamo un’immagine ai nostri progetti. Ricordiamoci di creare il symlink con l’apposito comando artisan e di aggiungere l’attributo enctype="multipart/form-data" ai form di creazione e di modifica!

27.02.24:
Ciao ragazzi,
continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo.
Vi consiglio di far diventare momentaneamente su git la repo laravel_auth come template, ne create una nuova chiamata come indicato sopra a partire dalla repo template appena creata quindi clonatevi laravel_one_to_many in locale. A questo punto fate ridiventare laravel-auth una repo normale. Orao ricordatevi di eseguire i comandi composer install, npm install, copiatevi il file .env.example per creare un nuovo file .env ed inseritegli i parametri di connessione al database (il database rimane lo stesso, non cambia). Eseguite anche il comando php artisan key:generate.
Nel nuovo esercizio aggiungiamo una nuova entità Type. Questa entità rappresenta la tipologia di progetto ed è in relazione one to many con i progetti.
I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:
- create il model Type con la migration, seeder, store ed update request e resource controller ( -rcmsR )
- creare la migration di modifica per la tabella projects per aggiungere la chiave esterna
- aggiungere ai model Type e Project i metodi per definire la relazione one to many
- visualizzare nella pagina di dettaglio di un progetto la tipologia associata, se presente
- permettere all’utente di associare una tipologia nella pagina di creazione e modifica di un progetto
- gestire il salvataggio dell’associazione progetto-tipologia con opportune regole di validazione
Bonus 1:
aggiungere le operazioni CRUD per il model Type, in modo da gestire le tipologie di progetto direttamente dal pannello di amministrazione.
Buon lavoro e buon divertimento!

28.02.24:
Esercizio di oggi: Laravel Boolfolio - Project Technology
nome repo: [laravel-many-to-many]
Ciao ragazzi,
continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo e aggiungiamo una nuova entità Technology. Questa entità rappresenta le tecnologie utilizzate ed è in relazione many to many con i progetti.
Come ieri, rendete momentaneamente la repo laravel-one-to-many una repo di template, quindi create quella nuova, clonatela in locale e quindi riportate la repo di ieri a normale.
I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:
- creare il model Technology con relativa  migration, seeder ecc (-rcmsR)
- creare la migration per la tabella pivot project_technology
- aggiungere ai model Technology e Project i metodi per definire la relazione many to many
- visualizzare nella pagina di dettaglio di un progetto le tecnologie utilizzate, se presenti
- permettere all’utente di associare le tecnologie nella pagina di creazione e modifica di un progetto
Bonus 1:
aggiungere le operazioni CRUD per il model Technology, in modo da gestire le tecnologie utilizzate nei progetti direttamente dal pannello di amministrazione.

01.03.24:
Esercizio di oggi: Laravel Boolfolio - API
Ciao ragazzi,
continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo.
L’esercizio di oggi è suddiviso in milestone ed è importante che ne seguiate l’ordine.
Milestone 1 OK
nome repo 1: laravel-api
Aggiungiamo al nostro progetto Laravel una nuovo Api/ProjectController. Questo controller risponderà a delle richieste via API e si occuperà di restituire la lista dei progetti presenti nel database in formato json.
Milestone 2 OK
Testiamo la chiamata API tramite Postman e assicuriamoci di ricevere i dati correttamente.
Milestone 3 OK
nome repo 2: vite-boolfolio
Iniziamo ad occuparci della parte front-office della nostra applicazione: creiamo un nuovo progetto Vue 3 con Vite e installiamo axios.
Colleghiamo questo progetto ad una repo separata.
Milestone 4 OK
Nel componente principale della nostra Vue App facciamo una chiamata API all’endpoint costruito nel progetto Laravel (milestone 1) e recuperiamo tutti i progetti dal nostro back-end.
Stampiamo in console i risultati e verifichiamo di ricevere i dati correttamente.
Milestone 5
Creiamo un nuovo componente ProjectCard, che corrisponde ad una card per visualizzare un progetto. Utilizziamo questo componente per visualizzare tutti i progetti ricevuti tramite API.
Bonus:
Gestire la paginazione dei risultati

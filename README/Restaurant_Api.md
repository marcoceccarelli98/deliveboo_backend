Documentazione API Ristoranti

Benvenuto alla documentazione dell'API Ristoranti! Questa guida ti aiuterà a comprendere come utilizzare la nostra API per recuperare informazioni sui ristoranti. L'API è progettata per essere semplice e intuitiva, permettendoti di accedere ai dati di cui hai bisogno in modo efficiente.
Panoramica dell'API

La nostra API dei Ristoranti ti permette di recuperare informazioni sui ristoranti nel nostro database. Puoi ottenere un elenco di tutti i ristoranti o filtrare i risultati in base a categorie specifiche. Questo è particolarmente utile se stai sviluppando un'applicazione che necessita di mostrare ristoranti di determinati tipi di cucina.

Come Usare l'API

L'API ha un unico endpoint principale che puoi utilizzare per recuperare i dati dei ristoranti. Vediamo come funziona:
Endpoint: Recupera Ristoranti

URL: /api/restaurants
Metodo HTTP: GET

Questo endpoint è molto flessibile. Puoi usarlo in due modi principali:

Recuperare tutti i ristoranti:
Se vuoi un elenco di tutti i ristoranti nel database, fai semplicemente una richiesta GET all'endpoint senza alcun parametro.
Filtrare per categorie:
Se sei interessato solo a ristoranti di specifiche categorie, puoi utilizzare il parametro categories nella tua richiesta.

Ecco alcuni esempi pratici:

Esempio 1: Recuperare tutti i ristoranti
Per ottenere un elenco di tutti i ristoranti, fai una richiesta come questa:
CopyGET /api/restaurants

Esempio 2: Filtrare ristoranti per categorie
Se vuoi solo ristoranti italiani e pizzerie, puoi fare una richiesta come questa:
CopyGET /api/restaurants?types=italiano,pizzeria

Nota come le categorie sono separate da una virgola. Puoi includere quante categorie desideri in questo modo.
Cosa aspettarsi come risposta quando fai una richiesta all'API, riceverai una risposta in formato JSON. La risposta conterrà un array di oggetti, dove ogni oggetto rappresenta un ristorante.

Ecco un esempio di come potrebbe apparire:
jsonCopy[
{
"id": 1,
"name": "Trattoria da Mario",
"address": "Via Roma 123, Milano",
"types": ["italian", "pizzeria"],
"created_at": "2024-09-12 10:30:00"
},
{
"id": 2,
"name": "Sushi Zen",
"address": "Corso Vittorio Emanuele 45, Milano",
"types": ["japanese", "sushi"],
"created_at": "2024-09-11 14:15:00"
}
]

Ogni ristorante nell'array ha le seguenti informazioni:
-id: Un identificatore unico per il ristorante.
-name: Il nome del ristorante.
-address: L'indirizzo del ristorante.
-types: Un array di categorie a cui appartiene il ristorante.
-created_at: La data e l'ora in cui il ristorante è stato aggiunto al database.

Gestione degli errori
L'API è progettata per essere robusta, ma ci sono alcune situazioni in cui potresti ricevere una risposta di errore:

Nessun ristorante trovato:
Se la tua ricerca non produce risultati (ad esempio, se cerchi una categoria che non esiste), riceverai una risposta con codice di stato 404 (Not Found).
Errore del server:
In rari casi, se si verifica un problema interno, potresti ricevere una risposta con codice di stato 500 (Internal Server Error).

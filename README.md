#progetto scolastico per esercitazione

questo è un progetto scolastico che serve per esercitarzi sulla programmazione di pagine dinamiche con php, il sito è collegato ad un database locale hostato con xampp.
Il progetto richiede la realizzazione di un sito scolastico che permetta ai docenti (utenti autenticati) di gestire le prenotazioni di aule scolastiche.

il database si compone di 2 tabelle: 
- docenti
- aule_scolastiche

## schema E/R
![schema E/R](images/schema_ER.png)

Il sito deve permettere ai docenti di compiere le seguenti operazioni sul database:
- visualizzazione di tutte le relazioni
- prenotazione di aule da parte di utenti autenticati
- eliminazione delle prenotazioni da parte di utenit autenticati

## schema logico 
- aule_risorse (<u>ID</u>) 
- docenti (<u>username</u>, nome, cognome, password) 
- prenotare(<u>username</u>, <u>ID</u>, data_prenotazione) 


## 🛠️ Requisiti
- PHP >= 7.4
- Composer
- MySQL / MariaDB 
- Estensioni PHP necessarie: vlucas/phpdotenv



## ⚙️ Installazione

1. Clona il progetto:

   ```bash
   git clone https://github.com/XbiteX/prenotazione_aule
   cd prenotazione_aule
   ```

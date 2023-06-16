<?php
enum Matches : string
{

    case isin = '/<a\s+class="c-faceplate__company-link"\s+href="([^"]+)"\s+title="([^"]+)"/';

    /* TABLE ENTREPRISE */
    case label = "label";
    case codeISIN = "codeISIN";
    case codeEnt = "codeEnt";
    case pays = "pays";

    /* TABLE COURS */
    case date_heure = "date_heure";
    case ouverture = "ouverture_cours";
    case cloture = "cloture_veille";
    case haut = "cours_haut";
    case bas = "cours_bas";
    case volume ="volume";
    case variation = "variation";
    case valorisation = "valorisation"; // Facultatif
    case risque_esg = "risque_esg"; // Facultatif
    case date_derniere_dividende = "date_last_dividende"; // Facultatif

    /* TABLE MESSAGE */

    case title = "titre";
    case content = "content";
    case sender = "emetteur";
    case date = "date";
    case idMessageTo = "id_message_to"; // id du message auquel il répond (-1 par défaut)

}
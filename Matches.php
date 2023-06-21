<?php
enum Matches : string
{
    case codeUrl = '/<a\s+class="c-faceplate__company-link"\s+href="([^"]+)"/';
    case title = '/<a\s+class="c-faceplate__company-link"\s+[^^]{0,100}\s+title="([^"]+)"/';

    /* TABLE ENTREPRISE */
    case codeIsin = '/<h2\s+class="c-faceplate__isin">([A-Z0-9]+)/';

    case codeEnt = '/<h2\s+class="c-faceplate__isin">[A-Z0-9]+\s+([A-Z]+)/';

    case ouverture = '/<span\s+class="c-instrument c-instrument--open" data-ist-open>([\d+ ?]+[.]{0,1}[\d]+)/';
    case cloture = '/<span\s+class="c-instrument c-instrument--previousclose" data-ist-previousclose>([\d+ ?]+[.]{0,1}[\d]+)/';
    case haut = '/<span\s+class="c-instrument c-instrument--high" data-ist-high>([\d+ ?]+[.]{0,1}[\d]+)/';
    case bas = '/<span\s+class="c-instrument c-instrument--low" data-ist-low>([\d+ ?]+[.]{0,1}[\d]+)/';
    case volume = '/<span\s+class="c-instrument c-instrument--totalvolume" data-ist-totalvolume>([\d+ ?]+[.]{0,1}[\d]+)/';
    case variation = '/<span\s+class="c-instrument c-instrument--variation" data-ist-variation>([\d+ ?]+[.]{0,1}[\d]+)/';


//
//    /* TABLE MESSAGE */
//
//    case forumTitle = "titre";
//    case forumContent = "content";
//    case orumSender = "emetteur";
//    case orumDate = "date";
//    case orumIdMessageTo = "id_message_to"; // id du message auquel il répond (-1 par défaut)

}
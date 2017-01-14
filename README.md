# Sarajevo Through History
Projekat - Web tehnologije

Vildana Panjeta (17087)

Stranica je posvećena gradu Sarajevu i njegovim promjenama kroz vrijeme.
Kao i građevinama nastalim u određenim epohama sa informacijama o nadolazećim dešavanjima u njima...

#SPIRALA 3.

## Šta je urađeno?<br/>
1.Serijalizacija podataka:<br/>
a) forma anketa (historija.php - > anketa.xml). Popunjava je "obični" korisnik.<br/>
b) forma prica (sarajevskePrice.php - > sarajevskePrice.xml). Popunjava je "obični" korisnik.<br/>
c) forma login (login.php, za sada omogucen login samo administratora, pa samim tim u xml-u se nalaze jedino njegovi podaci).</br>
Pristupni podaci za administratora:<br>
username: admin<br/>
password: 123456<br/>
d) Nakon login-a otvara se admin panel (pocetnaAdministrator.php). Omogućen je samo njemu unos, brisanje i izmjena događaja. Događaji se dodaju u dogadjaj.xml fajl.<br/>
Urađena validacija podataka prije upisa u xml.<br/>
2.Download u obliku csv<br/>
Link na admin-ovom panelu: Preuzmi CSV (preuzima podatke iz sarajevskePrice.xml)<br/>
3. Generisanje PDF-a<br/>
Link na admin-ovom panelu: Preuzmi PDF (preuzima podatke iz anketa.xml)<br/>
4. Pretraga događaja<br/>
Link na admin-ovom panelu: Pretraga događaja (admin može pretražiti događaje po nazivu i mjestu događaja, prikaz do 10 rezultata)<br/>
5. Deployment stranice na OpenShift<br/>
Link : http://sth-sth.44fs.preview.openshiftapps.com/
<br/>
## Šta nije urađeno?<br />
-

## Bug-ovi koje ste primijetili, ali niste stigli ispraviti, a znate rješenje (opis rješenja)<br />
-

## Bug-ovi koje ste primijetili, ali ne znate rješenje<br />

## Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne rečenice šta se u fajlu nalazi<br />
pocetnaAdmin.php - adminov panel<br/>
pretragaDogadjaja.php - podstranica za pretragu dogadjaja i php skripta za prikazivanje rezultata pretrage klikom na dugme <br/>
search.php - php skripta za pretragu dogadjaja prilikom kucanja znakova <br/>
pdf.php - php skripta za generisanje PDF-a<br/>
csv.php - php skripta za generisanje csv-a<br/>
logout.php - php skripta za odjavu admin-a<br/>
anketa.xml - xml sa rezultatima ankete <br/>
dogadjaj.xml - xml sa upisanim dogadjajima <br/>
pod.xml - xml sa admin-ovim podacima za prijavu <br/>
sarajevskePrice.xml - xml sa poslanim pricama <br/>


#SPIRALA 2.

## Šta je urađeno?<br/>
a) Validacija formi u JavaScript-u (file.js): <br/>
-validirajLogIn() (login.html)<br/>
-validirajSignIn() (login.html)<br/>
-validirajKonkurs() (historija.html)<br/>
b) Implementirane su sljedeće funkcionalnosti:<br/>
-dropdown meni (podstranica: historija.html -> antika.html)<br/>
-meni u vidu stabla (podstranica: historija.html -> antika.html)<br/>
-carousel (novosti.html)<br/>
c) podstranice se učitavaju bez reloada cijele stranice<br/>

## Šta nije urađeno?<br />
-

## Bug-ovi koje ste primijetili, ali niste stigli ispraviti, a znate rješenje (opis rješenja)<br />
-

## Bug-ovi koje ste primijetili, ali ne znate rješenje<br />
Ukoliko je trenutna podstranica antika.html (podstranica podstranice historija.html), otvaranje podstranica menija (osim Početne/index.html) ne daje ispravan prikaz (ajax-problem?).
## Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne rečenice šta se u fajlu nalazi<br />

JS: <br/>
file.js

CSS:<br />
stil1.css - stil za desktop uređaje<br />
stil2.css - stil za mobilne uređaje<br />

HTML:<br />
pocetna.html/index.html - Početna stranica. Sadrži kontakt i kratak opis o stranici.<br />
novosti.html - Stranica sa novostima/najavama događaja. Unutar sebe sadrži linkove na druge postranice: vijesti, dešavanja, vaše priče, ličnost dana, vaše ocjene (trenutno nisu implementirane).<br />
historija.html - Stranica sadrži linkove na druge podstranice/epohe u historiji grada (antičko doba, srednji vijek, osmansko doba, austrougarsko doba, moderno doba/trenutno nisu implentirane). Sadrži i anketu/pitanje dana; dodat će se i rezultati ankete.<br />
sarajevskeprice.html - Stranica sa formom za slanje priče.<br />
login.html -  Stranica sa formama: login i registracija.<br />
antika.html - Podstranica stranice historija.html. Sadrži 2 menija.<br/>

# SPIRALA 1.

## Šta je urađeno?
Skice stranica (index.html/pocetna.html,novosti.html, historija.html, sarajevskePrice.html, login.html) za desktop, kao i za mobilne uređaje.<br />
Sve stranice (gore navedene) imaju grid-view izgled i responzivne su.<br />
Putem media query-a napravljen je izgled za mobilne uređaje (poseban css file za mobilne uređaje: stil2.css)<br />
CSS je eksterni i nalazi se u 2 fajla: stil1.css i stil2.css.<br />
Html forme: <br />
1) Login forma (Stranica: login.html)<br />
2) Registracija forma (Stranica: login.html)<br />
3) Slanje priče forma (Stranica: sarajevskePrice.html)<br />
4) Anketa (Stranica: historija.html)<br />
Napravljen je meni (vidljiv na svim stranicama).<br />

## Šta nije urađeno?<br />
-

## Bug-ovi koje ste primijetili, ali niste stigli ispraviti, a znate rješenje (opis rješenja)<br />
-

## Bug-ovi koje ste primijetili, ali ne znate rješenje<br />
-
## Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne rečenice šta se u fajlu nalazi<br />

CSS:<br />
stil1.css - stil za desktop uređaje<br />
stil2.css - stil za mobilne uređaje<br />

HTML:<br />
pocetna.html/index.html - Početna stranica. Sadrži kontakt i kratak opis o stranici.<br />
novosti.html - Stranica sa novostima/najavama događaja. Unutar sebe sadrži linkove na druge postranice: vijesti, dešavanja, vaše priče, ličnost dana, vaše ocjene (trenutno nisu implementirane).<br />
historija.html - Stranica sadrži linkove na druge podstranice/epohe u historiji grada (antičko doba, srednji vijek, osmansko doba, austrougarsko doba, moderno doba/trenutno nisu implentirane). Sadrži i anketu/pitanje dana; dodat će se i rezultati ankete.<br />
sarajevskeprice.html - Stranica sa formom za slanje priče.<br />
login.html -  Stranica sa formama: login i registracija.<br />



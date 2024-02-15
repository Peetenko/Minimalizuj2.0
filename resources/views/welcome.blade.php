@extends('layout')

@section('title')
    Home
@endsection

@section('content')
<div class="divTitle">
<h1>Home</h1>
</div>
<img onload="$(this).hide().fadeIn(800)" id="welcomeImage" src="{{ URL::to('/images/home_bw_small.jpg') }}" style="width: 100%;border-radius: 10px;">
<div class="divRow">
	<div class="divPostButtons" >
		<a href="/post"><button id="newPost">
			Minimalizmus ako životný štýl
		</button></a>
	</div>

</div>

<div class="divRow">
	<div class="divText">
		<p><b>Určite</b> poznáte ten pocit, keď niečo hladáte ale neviete to nájsť. Viete, že kde približne by to mohlo byť, ale keď si pomyslíte čo všetko musíte vybrať a poprehadzovať, kým sa vôbec presvedčíte či tam daný predmet je a on tam byť nemusí, tak sa vela krát nato radšej vykašlete, lebo sa vám dopredu nechce prechádzať tou tortúrov. Sú to veci, kopy vecí, ktoré ste už aj zabudli že ich máte. A stoja vám v ceste.</p><br />

		<p><b>Societa</b> nám v poslednych rokoch stále vštepuje viac a viac konzumu, ktorý si už ani neuvedomujeme. Je to uplná samozrejmosť. Vianoce? Darček! Narodeniny? Darček! Meniny? Darček! Došla výplata? Niečo si predsa zaslúžim. Niečo pekné, niečo nové, trocha sa potešiť. Dopamínový doping tohoto typu však trvá len chvílku, o chvílku vyprchá a naša nová vec sa stáva rovnako obyčajnov ako tie pred ňou.</p><br />

		<p><b>Problémom</b> však ostáva, že prehnaný, hociako pred sebou samím ospravedlnený konzumný tovar sa kopí a kopí. Vačšinou, keď si niečo kupujeme, vidíme len jednu hodnotu a tou je cena produktu. Problém je však oveľa komplexnejší ako cena. Čo miesto? Starostlivosť a danú vec či upratovanie? A na záver stres z preplnenia, neporiadku alebo nemožnosť sa rozhodnúť čo si napríklad obliecť. Ženy toto dobre poznajú a ich chlapi tiež. Nemám si čo obliecť. Táto veta v skutočnosti znamená že aj ked máš hordy šiat, je ich toľko, že už nemáš prehľad čo všetko máš a pritom vieš ze ktoré už len prebehneš a nemala si ich nasebe 5 rokov lebo bud vysli z módy alebo sú malé alebo velké alebo si sa v nich naposledy necítila tak dobre a podvedome si ich už vyradila a prehliadaš ich s tým že raz ti ešte padnú. Keby si si nechala len tie, ktoré vieš že máš najradsej a vyradila balast, máš väčší prehlad o tom čo máš a vieš že čo chytíš do ruky bude určite dobré a skráti to tvoj rozhodovací proces dramaticky.</p><br />

		<p><b>Stres</b>  z preplneného priestoru vnímate. Niekomu až tak nevadí ale určite ho každý vníma. Určite si pamätáte ten pocit, ktorý máte na dovolenke, keď dôjdete na apartmán či hotel. Nieje tam nič nepotrebné. Sú tam prázdne skrine, cistý stôl s prípadnou dekoráciou v podobe vázy alebo kvetu. Všetko ostatné ste si doniesli so sebou, a keď nieste Paris Hilton určite ste si brali iba tie najpodstatnejšie veci. Vďaka tomuto sa na dovolenke určite cítite lepšie ako doma, lebo vo vašej bezprostrednej blízkosti sú len tie najpotrebnejšie veci ktoré bez problémov schováte do prázdnych skriň hotelovej izby a aj to málo zmyzne z očí, zíde zmysle a je to vačšia pohoda.</p><br />

		<p><b>A presne</b>  o tom je minimalizmus ako zivotný štýl. Zbavit sa zbytočných vecí, ktoré nám zavadzajú v každodennom živote, zjednodušiť si život ako sa len dá a eliminovať stres ktorý prináša.
		Predstavte si že upratujete poličku. Na poličke je veľa drobných predmentov, ktoré najskôr musíte všetky odložiť aby ste mohli utrieť prach. Potom ich musíte naukladať naspäť tak aby to nejako vyzeralo. To bola jedna polička. Čo keď ich máme 10 a viac?Niekolko skrýň, jedna s pohármi, druhá so šálkami, ďalšia s pohármi ktoré sa vyberajú len na špecialnu príležitost lebo sú krištálové ci dvanásť dielny čajový set pani Rafikovej. A teraz si povedzte úprimne. Kolko stoho naozaj potrebujem?</p><br />

		<p><b>Domácnosti</b>  o 2 ľudoch mávajú často aj 20 šálok na kávu. Keď sa nato racionálne pozrieme asi vživote nebudeme mat 18 dalsich ludi v byte na čajovom dejchánku ci káve do plusu, nehovoriac o tom že ešte 6 ci 8 dielny set máš odložený na špeciálne príležitosti, ktorá bola naposledy pred 5 rokmi ked si si spomenul že ich máš a aspoň raz si ich použil. V skutočnosti sa tento princíp dá použiť na čokoľvek v byte či dome. Veľa krát sa stáva že sa nám v domácnosti duplikujú predmety lebo sme už zabudli že ich niekde máme, kúpili nové a potom pri upratovaní zistíme že máme 5 nožničiek na nechty, keby sme si chceli náhodou grupovo strihať nechty spolu s návštevou.</p> <br />

		<p><b>Princíp</b>  minimalizmu spočíva v tom, že vylúčime tieto predmety zo svojich životov a necháme si len tie, ktoré naozaj potrebujeme alebo nám nejakým spôsobom robia radosť. Samozrejme keď máš vázu ktorá je dominantou tvojho domáceho dizajnu tak si ju nechaj, ale nepotrebujes mať ďalších 10 v pivnici alebo na poličkách keby ti niekto raz poslal 100 ruží.</p><br />

		<p><b>To</b>  isté platí pre veci, ktoré síce voľakedy slúžili svojmu účelu a teda boli potrebné, ale už ich nepoužívame. Ľudia majú tendenciu hromadiť veci, čo siaha hlboko do minulosti a už je to v nás zakorenené. Je nám ľúto vyhodiť veci, ktoré v kútiku duše stále opatrujeme pre prípad že by raz...
		Nie, to o čo si nezakopol celú dekádu už pravdepodobne nevytiahneš a keby aj hej z dlhodobého hladiska to nemá perspektívu skladovať najmä ak je tých predmetov viac a zaberajú miesto.</p><br />

		<p><b>Keď</b> niečo čo nepotrebuješ má hodnotu, predaj to. Môžeš byť aj šlachetný a daruj. Tebe sa uvolní miesto a niekomu môže stále dobre poslúžiť a budeš mať dobrý pocit, že si niekomu pomohol.
		Svojím veciam dávame príliž velký význam a zabúdame že dôležité veci v našich životoch niesu vlastne vôbec vecami.</p><br />
	</div>
</div>
@endsection
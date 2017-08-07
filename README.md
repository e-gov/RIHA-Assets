# RIHA XML varamu

RIHA XML varamu on veebirakendus, mille kaudu tehakse avalikult kättesaadavaks asutustevahelises dokumendivahetuses kasutatavad XML varad (metaandmete andmekirjeldused). Kasutaja saab:

- sirvida varasid
- alla laadida varade faile
- esitada taotluse uue vara lisamiseks.

## Varamust lähemalt

RIHA XML varamu ülesandeks on kontrollida ja säilitada dokumendiliigi ning metaandmete andmekirjeldusi, mida edastatakse [asutustevahelise dokumendivahetuslahenduse (DVK/DHX)](https://www.ria.ee/ee/dokumendivahetus-dhx.html) kaudu. Kui andmekirjeldus on koostatud ja kooskõlastatud [vastavalt nõuetele](https://mkm.ee/sites/default/files/juhis_dokumendiliigi_xml_andmekirjelduse_koostamiseks.pdf), siis lähtutakse sellest seda liiki dokumentide koostamisel mistahes vormingus. Asutuse loodud dokumendi elementide koosseis lähtub vastava dokumendiliigi andmekirjeldusest, kui see on RIHAs registreeritud. Sellist liiki dokumendi ja selle veebivormide koostamisel võetakse aluseks andmekirjeldus. Dokument hoitakse alal koos dokumenti, selle seoseid ja haldamise ajalugu kirjeldavate metaandmetega. Dokumendi metaandmed peavad olema kooskõlas RIHAs registreeritud dokumendihalduse metaandmeloendi ja dokumendiliigi andmekirjeldusega. Otseste avalike teenuste osutamiseks vajaliku teabe kindlaksmääramist, jagamist ja vahetamist koordineeriv asutus on [Majandus- ja Kommunikatsiooniministeerium](https://www.mkm.ee/et/tegevused-eesmargid/infouhiskond/dokumendihaldusest-infohalduseni) ning RIHA XML varamu tegutseb [teenuste korraldamise ja teabehalduse alustel](https://www.riigiteataja.ee/akt/131052017007?leiaKehtiv).

## Vajalikud tehnoloogiad

- PHP (Töötab versioonil 7.1.6)
- rakendus kasutab tehnoloogiaid: Bootstrap 4, Chart.js, jQuery, Datatables.

## Veebiserverisse paigaldamine

Esiteks peab navigeerima veebiserveri kausta ning sealt leidma kausta `htdocs`.
Siis tõsta kõik XMLVaramu failid kausta `htdocs` ja ongi paigaldatud.

## Uute varamute Lisamine

Ava veebiserveri kaust ning navigeeri `XMLVarad` kausta:

```
resources/XMLVarad/
```

Tee `XMLVarad` kausta uus kaust, mille nimi on: `XMLVara_ + varamu nimi`.

**TÄHTIS:** Vaata, et kaustanimes kõik tühikud oleks asendatud alamkriipsuga `_`.

Kui XML varamu nimi on näiteks: `AT teadaanne`, siis selle varamu kausta nimi oleks: `XMLVara_AT_teadaanne
`.

Kui uue varamu kaust on valmis, siis kausta sisu struktuur jaguneb kaheks sõltuvalt, kas varamul on mitu  versiooni või mitte.

**TÄHTIS:** Ka failide puhul on tähtis, et tühikuid ei oleks.

*Näidete puhul on varamu nimeks AT teadaanne.*

Kui kaustal on ainult üks versioon:

```
* resources
    * XMLVarad
        * XMLVara_AT_teadaanne
            * failid
                * fail.xml
                * fail2.xsd
                * fail3.pdf
            * varamu.json
```

Kui kaustal on näiteks kaks versiooni:

```
* resources
    * XMLVarad
        * XMLVara_AT_teadaanne
            * V1.0
                * failid
                    * fail.xml
                    * fail2.xsd
                    * fail3.pdf
                * varamu.json
            * V2.1
                * failid
                    * fail.xml
                    * fail2.xsd
                    * fail3.pdf
                * varamu.json
```

Lisa nende skeemide järgi vajalikud failid uue varamu kausta. Küsimuste korral tasub vaadata juba olemas olevate varamute kaustasid.

## Autorid

* **Janar Peterson** - RIA praktikant
* **Raimond Roosalu** - RIA praktikant
* **Taavi Meinberg** - RIA praktikant
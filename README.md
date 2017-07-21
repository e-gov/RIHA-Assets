# RIHA XML Varamu

Kogumik kõikidest XML varamutest, mille kohta saavad kasutajad näha lisainfot ning allalaadida varamute faile.

## Vajalikud Tehnoloogiad

- PHP (Töötab versioonil 7.1.6)

## Veebserverisse paigaldamine

Esiteks peab navigeerima veebiserveri kausta ning sealt leidma kausta nimega 'htdocs'.
Siis tõsta kõik XMLVaramu failid kausta 'htdocs' ja ongi paigaldatud.

## Uute Varamute Lisamine

Ava veebiserveri kaust ning navigeeri 'XMLVarad' kausta:

```
resources/XMLVarad/
```

Tee 'XMLVarad' kausta uus kaust, mille nimi on: XMLVara_ + varamu nimi.

**TÄHTIS:** Vaata, et kaustanimes kõik tühikud oleks asendatud alamkriipsuga '_'.

```
Kui XML varamu nimi on näiteks: AT teadaanne, siis selle varamu kausta nimi oleks: XMLVara_AT_teadaanne
```

Kui uue varamu kaust on valmis, siis kausta sisu struktuur jaguneb kaheks sõltuvalt, kas varamul on mitu erinevat versiooni või mitte.

**TÄHTIS:** ka failide puhul on tähtis, et tühikuid ei oleks.

*Näidete puhul on varamu nimeks AT teadaanne.*

Kui kaustal on ainult üks versioon:

```
* XMLVaramu_AT_teadaanne
    * failid
        * fail.xml
        * fail2.xsd
        * fail3.pdf
    * varamu.json
```

Kui kaustal on näiteks kaks versiooni:

```
* XMLVaramu_AT_teadaanne
    * V1.0
        * failid
            * fail.xml
            * fail2.xsd
            * fail3.pdf
        * varamu.json
    * V2.3
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
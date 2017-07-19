# RIHA XML Varamu

A collection of all XML resources that users can see detailed information about.
Kogumik kõikidest XML varamutest, mille kohta saavad kasutajad näha lisainfot ning allalaadida varamute faile.

## Vajalikud Tehnoloogiad

- PHP
- Internet

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

## Autorid (kas vaja?)

* **Janar Peterson** - *Varamute tabel ja varamute andmete saamine, uute varamute lisamine* - RIA praktikant
* **Raimond Roosalu** - *Frontend (päised ja jalused), abilehtede valmistamine* - RIA praktikant
* **Taavi Meinberg** - *PHP'ga kaustade ja failide otsimine ja kuvamine, tabelite ja versioonide vahel navigeerimine* - RIA praktikant
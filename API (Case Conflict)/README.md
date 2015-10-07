#RESTFUL API

## Hva mener jeg med Restful API?

Det er rett og slett et link-basert "system" der man kan hente ut, lagre og slette
informasjon fra serveren ved å bruke de vanlige nøkkelordene *GET*, *PUT*, *POST* og *DELETE*

## Hvordan kan jeg bruke API-et?

Fra clientsiden bruker du et javascript for å sende et request til serveren (APIet). Letteste er nok å bruke jQuery sin
innebygde AJAX-funksjon.

Her henter vi ut alle bilder mellom 1 og 20, sortert etter ID og returnert som JSON-format.
Merk: Bruker også GET-funsksjonen. Lenger ned på denne siden finner dere flere eksempler.
```
	./api/getImages.php?imageIndex=1&imageOffset=20&imageSorting=id&format=json
```

```javascript
$.ajax({
		url: "./api/getImages.php?imageIndex=1&imageOffset=20&imageSorting=id&format=json",
		method: "GET"
	}).done(function(data) {
		// returnert data ligger nå i
		// data-variablene
});
```


## Tags som du kan bruke for å hente bilder:
| Command        | Beskrivelse
| ------------- |:-------------:|
| `imageIndex`      | Hente bilder fra server etter `id` |
| `imageOffset`      | Kombinert med `imageIndex` blir dette et bilderange der man kan hente mange bilder samtidig.     |
| `imageSorting` | Sorter bilder etter `id`, `date` eller `size`. Akkurat nå funker bare `id`      |
| `format` | Valgt returformat. Akkurat nå funker bare `json` |
| `selected` | Velg flere bilder, f.eks. `selected=1,2,3,10,20` der `,` brukes for å dele opp etter `id`      |

## TODO



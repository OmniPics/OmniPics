#RESTFUL API

## Hva mener jeg med Restful API?

Det er rett og slett et link-basert API der man kan hente ut, lagre og slette
informasjon fra serveren ved å bruke de vanlige nøkkelordene *GET*, *PUT*, *POST* og *DELETE*

## Hvordan kan jeg bruke API-et?

Fra clientsiden bruker du et javascript for å hente informasjon. Letteste er nok å bruke jQuery sin
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
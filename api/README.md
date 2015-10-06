#REST(ful) API

> Code is a mess now.. will be fixed. - Thomas Darvik

## How to get images using the API.

How to get images using the parameters "selected", "sorted" and "meta": 
The parameters have the values:
- Id equal to 10, 2 and 1
- Sorted by ID
- Meta data is also sent
```
	./api/getImages.php?selected=1,2,10&sorted=id&meta=true
```
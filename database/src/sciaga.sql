select distinct picture_id from has_tags;
select * from meta;
select * from tags;
select distinct picture_id from has_tags where tags_id = 2;

#
SELECT
 count(pictures.picture_id),pictures.picture_id, description, tags
FROM has_tags
	INNER JOIN pictures
		ON pictures.picture_id=has_tags.picture_id
	INNER JOIN tags
		ON tags.tags_id=has_tags.tags_id
	INNER JOIN has_meta
		ON has_meta.picture_id=has_tags.picture_id
	INNER JOIN meta
		ON meta.meta_id=has_meta.meta_id
GROUP BY pictures.picture_id;
        

# AND type search
SELECT
    pictures.picture_id
FROM has_tags
	INNER JOIN pictures
		ON pictures.picture_id=has_tags.picture_id
	INNER JOIN tags
		ON tags.tags_id=has_tags.tags_id
WHERE tags LIKE '' OR tags LIKE '%moje%' OR tags LIKE '%jadra%'
GROUP BY pictures.picture_id
HAVING (
	CASE
	# count - put here number of args used in where clause
	WHEN COUNT(pictures.picture_id) = 2
		THEN 1
		ELSE 0
	END
) = 1;


# OR type search
SELECT
 pictures.picture_id
FROM has_tags
	INNER JOIN pictures
		ON pictures.picture_id=has_tags.picture_id
	INNER JOIN tags
		ON tags.tags_id=has_tags.tags_id
	INNER JOIN has_meta
		ON has_meta.picture_id=has_tags.picture_id
	INNER JOIN meta
		ON meta.meta_id=has_meta.meta_id
WHERE description LIKE '%lol%' OR description like '%candle%'
GROUP BY pictures.picture_id;
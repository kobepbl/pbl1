WITH users_article_linking AS(
    SELECT
        *
    FROM
        current_users AS cu
    INNER JOIN
        article_list AS al
    ON
        cu.user_id = al.user_id
),
intermediate_linking AS(
    SELECT
        *
    FROM
        users_article_linking
    INNER JOIN
        article_list_tags
    ON
        users_article_linking.article_id = article_list_tags.article_id
),
tags_linking AS(
    SELECT
        *
    FROM
        tags
    INNER JOIN
        intermediate_linking
    ON
        tags.tags_id = intermediate_linking.tags_id
)
SELECT
    ta.article_id,
    ta.user_id,
    ta.name,
    ta.title,
    ta.sentence,
    ta.like_count,
    ta.creation_date,
    ta.tags
FROM
    tags_linking AS ta
WHERE
    ta.sentence LIKE '" . "%" . $search_word . "%" . "'
    OR ta.title LIKE '" . "%" . $search_word . "%" . "'
    OR ta.tags LIKE '" . $search_word . "'
ORDER BY
    creation_date DESC
;";
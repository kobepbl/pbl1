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
        users_article_linking.article_id = article_list_tags.user_id
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
    article_id,
    user_id,
    name,
    title,
    sentence,
    like_count,
    creation_date,
    tags
FROM
    tags_linking
WHERE
    sentence LIKE '" . "%" . $search_word . "%" . "'
    OR title LIKE '" . "%" . $search_word . "%" . "'
    OR tags LIKE '" . $search_word . "'
ORDER BY
    creation_date DESC
;";
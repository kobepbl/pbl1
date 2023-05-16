SELECT
            article_id,
            current_users.user_id,
            name,
            title,
            sentence,
            like_count,
            creation_date
        FROM
            article_list
        INNER JOIN
            current_users
        ON
            article_list.user_id = current_users.user_id
        WHERE
            article_id IN (
        SELECT
            article_id
        FROM
            tags
        INNER JOIN
            article_list_tags
        ON
            tags.tags_id = article_list_tags.tags_id
        WHERE
            tags = ?
        )
        OR
        sentence LIKE '" . "%" . $search_word . "%" . "'
        OR title LIKE '" . "%" . $search_word . "%" . "'
        ORDER BY
            creation_date DESC
;";
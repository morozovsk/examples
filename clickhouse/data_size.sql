-- by columns:
SELECT
    table, name,
    formatReadableSize(data) AS size
FROM
(
    SELECT
        table,
        name,
        sum(data_compressed_bytes) AS data
    FROM system.columns
    GROUP BY table, name
    ORDER BY data DESC
);

-- by tables:
SELECT
    table,
    formatReadableSize(data) AS size
FROM
(
    SELECT
        table,
        sum(data_compressed_bytes) AS data
    FROM system.columns
    GROUP BY table
    ORDER BY data DESC
);

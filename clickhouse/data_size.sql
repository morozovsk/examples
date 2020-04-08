select concat(database, '.', table)                         as table,
       formatReadableSize(sum(bytes))                       as size,
       sum(rows)                                            as rows,
       max(modification_time)                               as latest_modification,
       sum(bytes)                                           as bytes_size,
       any(engine)                                          as engine,
       formatReadableSize(sum(primary_key_bytes_in_memory)) as primary_keys_size,
       formatReadableSize(sum(bytes) / rows * 1000000)      as size_per_1kk_rows
from system.parts
where active
group by database, table
order by bytes_size desc;

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

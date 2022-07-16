<?php

namespace Okra\Support\Entities;

class Pagination extends Entity
{
    /**
     * The total docs of the results returned.
     *
     * @var int|null $totalDocs
     */
    public ?int $totalDocs;

    /**
     * This limits the number of results returned.
     *
     * @var int|null $limit
     */
    public ?int $limit;

    /**
     * The hasPrevPage is always true when the page is greater than 1.
     *
     * @var bool|null $hasPrevPage
     */
    public ?bool $hasPrevPage;

    /**
     * It indicates whether there are more resources matching the query. If true, you may want to make subsequent
     * requests to retrieve the other resources.
     *
     * @var bool|null $hasNextPage
     */
    public ?bool $hasNextPage;

    /**
     * The page field represents the current page.
     *
     * @var int|null $page
     */
    public ?int $page;

    /**
     * The total page of the results returned.
     *
     * @var int|null $totalPages
     */
    public ?int $totalPages;

    /**
     * @var int|null $pagingCounter
     */
    public ?int $pagingCounter;

    /**
     * The previous page of results. If there is no previous page, the value is null.
     *
     * @var string|null $prevPage
     */
    public ?string $prevPage;

    /**
     * The next page of results. Each page consists of up to 100 items. If there are not enough results for an
     * additional page, the value is null.
     *
     * @var string|null $nextPage
     */
    public ?string $nextPage;
}

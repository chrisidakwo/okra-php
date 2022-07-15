<?php

namespace Okra\Support\Entities;

class Photo extends Entity
{
    /**
     * Okra's unique ID for the photo.
     *
     * @var string $_id
     */
    public string $_id;

    /**
     * The url pointing to the image.
     *
     * @var string $url
     */
    public string $url;

    /**
     * The image type format of the photo.
     *
     * @var string $imageType
     */
    public string $imageType;

    /**
     * @var string|null $bank
     */
    public ?string $bank;
}

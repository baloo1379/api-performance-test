<?php

namespace App\GraphQL\Input;

use Overblog\GraphQLBundle\Annotation as GQL;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @GQL\Input
 */
class BookInput
{
    /**
     * @GQL\Field(type="String")
     */
    private ?string $title;

    /**
     * @GQL\Field(type="String")
     */
    private ?string $authors;

    /**
     * @GQL\Field(type="Float")
     */
    private ?float $average_rating;

    /**
     * @GQL\Field(type="String")
     */
    private ?string $isbn;

    /**
     * @GQL\Field(type="String")
     */
    private ?string $isbn13;

    /**
     * @GQL\Field(type="String")
     */
    private ?string $language_code;

    /**
     * @GQL\Field(type="Int")
     */
    private ?int $num_pages;

    /**
     * @GQL\Field(type="Int")
     */
    private ?int $ratings_count;

    /**
     * @GQL\Field(type="Int")
     */
    private ?int $text_reviews_count;

    /**
     * @GQL\Field(type="String")
     */
    private ?string $publication_date;

    /**
     * @GQL\Field(type="Int")
     */
    private ?int $publisher;

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getAuthors(): ?string
    {
        return $this->authors;
    }

    /**
     * @param string|null $authors
     */
    public function setAuthors(?string $authors): void
    {
        $this->authors = $authors;
    }

    /**
     * @return float|null
     */
    public function getAverageRating(): ?float
    {
        return $this->average_rating;
    }

    /**
     * @param float|null $average_rating
     */
    public function setAverageRating(?float $average_rating): void
    {
        $this->average_rating = $average_rating;
    }

    /**
     * @return string|null
     */
    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    /**
     * @param string|null $isbn
     */
    public function setIsbn(?string $isbn): void
    {
        $this->isbn = $isbn;
    }

    /**
     * @return string|null
     */
    public function getIsbn13(): ?string
    {
        return $this->isbn13;
    }

    /**
     * @param string|null $isbn13
     */
    public function setIsbn13(?string $isbn13): void
    {
        $this->isbn13 = $isbn13;
    }

    /**
     * @return string|null
     */
    public function getLanguageCode(): ?string
    {
        return $this->language_code;
    }

    /**
     * @param string|null $language_code
     */
    public function setLanguageCode(?string $language_code): void
    {
        $this->language_code = $language_code;
    }

    /**
     * @return int|null
     */
    public function getNumPages(): ?int
    {
        return $this->num_pages;
    }

    /**
     * @param int|null $num_pages
     */
    public function setNumPages(?int $num_pages): void
    {
        $this->num_pages = $num_pages;
    }

    /**
     * @return int|null
     */
    public function getRatingsCount(): ?int
    {
        return $this->ratings_count;
    }

    /**
     * @param int|null $ratings_count
     */
    public function setRatingsCount(?int $ratings_count): void
    {
        $this->ratings_count = $ratings_count;
    }

    /**
     * @return int|null
     */
    public function getTextReviewsCount(): ?int
    {
        return $this->text_reviews_count;
    }

    /**
     * @param int|null $text_reviews_count
     */
    public function setTextReviewsCount(?int $text_reviews_count): void
    {
        $this->text_reviews_count = $text_reviews_count;
    }

    /**
     * @return string|null
     */
    public function getPublicationDate(): ?string
    {
        return $this->publication_date;
    }

    /**
     * @param string|null $publication_date
     */
    public function setPublicationDate(?string $publication_date): void
    {
        $this->publication_date = $publication_date;
    }

    /**
     * @return int|null
     */
    public function getPublisher(): ?int
    {
        return $this->publisher;
    }

    /**
     * @param int|null $publisher
     */
    public function setPublisher(?int $publisher): void
    {
        $this->publisher = $publisher;
    }



}

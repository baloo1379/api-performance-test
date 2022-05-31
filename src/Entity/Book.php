<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $authors;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $average_rating;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $isbn;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $isbn13;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $language_code;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $num_pages;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $ratings_count;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $text_reviews_count;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $publication_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $publisher;

    public function getId(): ?int
    {
        return $this->id;
    }

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
     * @return string|null
     */
    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    /**
     * @param string|null $publisher
     */
    public function setPublisher(?string $publisher): void
    {
        $this->publisher = $publisher;
    }


}

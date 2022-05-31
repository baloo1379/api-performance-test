<?php

namespace App\Entity;

use App\Repository\SongRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SongRepository::class)
 */
class Song
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
    private string $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $artist;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $top_genre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $year;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $bpm;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $nrgy;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $dnce;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $dB;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $live;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $val;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $dur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $acous;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $spch;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $pop;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getArtist(): string
    {
        return $this->artist;
    }

    /**
     * @param string $artist
     */
    public function setArtist(string $artist): void
    {
        $this->artist = $artist;
    }

    /**
     * @return string
     */
    public function getTopGenre(): string
    {
        return $this->top_genre;
    }

    /**
     * @param string $top_genre
     */
    public function setTopGenre(string $top_genre): void
    {
        $this->top_genre = $top_genre;
    }

    /**
     * @return string
     */
    public function getYear(): string
    {
        return $this->year;
    }

    /**
     * @param string $year
     */
    public function setYear(string $year): void
    {
        $this->year = $year;
    }

    /**
     * @return int
     */
    public function getBpm(): int
    {
        return $this->bpm;
    }

    /**
     * @param int $bpm
     */
    public function setBpm(int $bpm): void
    {
        $this->bpm = $bpm;
    }

    /**
     * @return int
     */
    public function getNrgy(): int
    {
        return $this->nrgy;
    }

    /**
     * @param int $nrgy
     */
    public function setNrgy(int $nrgy): void
    {
        $this->nrgy = $nrgy;
    }

    /**
     * @return int
     */
    public function getDnce(): int
    {
        return $this->dnce;
    }

    /**
     * @param int $dnce
     */
    public function setDnce(int $dnce): void
    {
        $this->dnce = $dnce;
    }

    /**
     * @return int
     */
    public function getDB(): int
    {
        return $this->dB;
    }

    /**
     * @param int $dB
     */
    public function setDB(int $dB): void
    {
        $this->dB = $dB;
    }

    /**
     * @return int
     */
    public function getLive(): int
    {
        return $this->live;
    }

    /**
     * @param int $live
     */
    public function setLive(int $live): void
    {
        $this->live = $live;
    }

    /**
     * @return int
     */
    public function getVal(): int
    {
        return $this->val;
    }

    /**
     * @param int $val
     */
    public function setVal(int $val): void
    {
        $this->val = $val;
    }

    /**
     * @return int
     */
    public function getDur(): int
    {
        return $this->dur;
    }

    /**
     * @param int $dur
     */
    public function setDur(int $dur): void
    {
        $this->dur = $dur;
    }

    /**
     * @return int
     */
    public function getAcous(): int
    {
        return $this->acous;
    }

    /**
     * @param int $acous
     */
    public function setAcous(int $acous): void
    {
        $this->acous = $acous;
    }

    /**
     * @return int
     */
    public function getSpch(): int
    {
        return $this->spch;
    }

    /**
     * @param int $spch
     */
    public function setSpch(int $spch): void
    {
        $this->spch = $spch;
    }

    /**
     * @return int
     */
    public function getPop(): int
    {
        return $this->pop;
    }

    /**
     * @param int $pop
     */
    public function setPop(int $pop): void
    {
        $this->pop = $pop;
    }


}

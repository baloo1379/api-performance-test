<?php

namespace App\Command;

use App\Entity\Book;
use App\Entity\Song;
use League\Csv\Reader;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:populate-db',
    description: 'Truncates db tables and populate them with fresh data.',
    aliases: ['app:populate'],
    hidden: false
)]
class PopulateDBCommand extends Command
{
    protected static $defaultName = 'app:populate-db';
    protected static $defaultDescription = 'Truncates db tables and populate them with fresh data.';

    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;

        parent::__construct();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws \League\Csv\Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $output->writeln([
            'Baloo DB Manager',
            '================',
        ]);
        $em = $this->doctrine->getManager();
        $connection = $em->getConnection();

        $output->writeLn('-> Truncate DB Table \'song\'');

        $connection->prepare('TRUNCATE TABLE song')->executeQuery();
        /** @var array $songs */
        $songs = $em->getRepository(Song::class)->findBy([], []);

        $output->writeLn('-> Truncate DB Table \'book\'');
        $connection->prepare('TRUNCATE TABLE book')->executeQuery();

        /** @var array $songs */
        $books = $em->getRepository(Book::class)->findBy([], []);

        $output->writeln('-> Reading file \'songs.csv\'');

        $songsReader = Reader::createFromPath('%kernel.root_dir%/../songs.csv', 'r');
        $songsReader->setHeaderOffset(0);
        $results = $songsReader->getRecords();

        $io->progressStart(iterator_count($results));

        foreach ($results as $row) {

            $song = new Song();
            $song->setTitle($row['title']);
            $song->setArtist($row['artist']);
            $song->setTopGenre($row['top_genre']);
            $song->setYear($row['year']);
            $song->setBpm($row['bpm']);
            $song->setNrgy($row['nrgy']);
            $song->setDnce($row['dnce']);
            $song->setDB($row['dB']);
            $song->setLive($row['live']);
            $song->setVal($row['val']);
            $song->setDur($row['dur']);
            $song->setAcous($row['acous']);
            $song->setSpch($row['spch']);
            $song->setPop($row['pop']);

            $em->persist($song);

            $io->progressAdvance();
        }

        $em->flush();
        $io->progressFinish();

        $output->writeln('-> Reading file \'books.csv\'');

        $songsReader = Reader::createFromPath('%kernel.root_dir%/../books.csv', 'r');
        $songsReader->setHeaderOffset(0);
        $results = $songsReader->getRecords();

        $io->progressStart(iterator_count($results));

        foreach ($results as $row) {

            $book = new Book();
            $book->setTitle($row['title']);
            $book->setAuthors($row['authors']);
            $book->setAverageRating((float)$row['average_rating']);
            $book->setIsbn($row['isbn']);
            $book->setIsbn13($row['isbn13']);
            $book->setLanguageCode($row['language_code']);
            $book->setNumPages((int)$row['num_pages']);
            $book->setRatingsCount((int)$row['ratings_count']);
            $book->setTextReviewsCount((int)$row['text_reviews_count']);
            $book->setPublicationDate($row['publication_date']);
            $book->setPublisher($row['publisher']);

            $em->persist($book);

            $io->progressAdvance();
        }

        $em->flush();
        $io->progressFinish();

        $io->success('Command exited cleanly!');
        return Command::SUCCESS;
    }
}

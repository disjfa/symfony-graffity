<?php

namespace App\Tests\Controller;

use App\Entity\Blog;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class BlogControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;

    /** @var EntityRepository<Blog> */
    private EntityRepository $blogRepository;
    private string $path = '/blog/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->blogRepository = $this->manager->getRepository(Blog::class);

        foreach ($this->blogRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Blog index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first()->text());
    }

    public function testNew(): void
    {
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'blog[name]' => 'Testing',
            'blog[intro]' => 'Testing',
            'blog[content]' => 'Testing',
            'blog[publish_date]' => 'Testing',
            'blog[created_at]' => 'Testing',
            'blog[updated_at]' => 'Testing',
        ]);

        self::assertResponseRedirects('/blog');

        self::assertSame(1, $this->blogRepository->count([]));

        $this->markTestIncomplete('This test was generated');
    }

    public function testShow(): void
    {
        $fixture = new Blog();
        $fixture->setName('My Title');
        $fixture->setIntro('My Title');
        $fixture->setContent('My Title');
        $fixture->setPublishDate('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Blog');

        // Use assertions to check that the properties are properly displayed.
        $this->markTestIncomplete('This test was generated');
    }

    public function testEdit(): void
    {
        $fixture = new Blog();
        $fixture->setName('Value');
        $fixture->setIntro('Value');
        $fixture->setContent('Value');
        $fixture->setPublishDate('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUpdatedAt('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'blog[name]' => 'Something New',
            'blog[intro]' => 'Something New',
            'blog[content]' => 'Something New',
            'blog[publish_date]' => 'Something New',
            'blog[created_at]' => 'Something New',
            'blog[updated_at]' => 'Something New',
        ]);

        self::assertResponseRedirects('/blog');

        $fixture = $this->blogRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getName());
        self::assertSame('Something New', $fixture[0]->getIntro());
        self::assertSame('Something New', $fixture[0]->getContent());
        self::assertSame('Something New', $fixture[0]->getPublishDate());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getUpdatedAt());

        $this->markTestIncomplete('This test was generated');
    }

    public function testRemove(): void
    {
        $fixture = new Blog();
        $fixture->setName('Value');
        $fixture->setIntro('Value');
        $fixture->setContent('Value');
        $fixture->setPublishDate('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUpdatedAt('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/blog');
        self::assertSame(0, $this->blogRepository->count([]));

        $this->markTestIncomplete('This test was generated');
    }
}

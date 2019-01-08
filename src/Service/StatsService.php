<?php


namespace App\Service;

use Doctrine\Common\Persistence\ObjectManager;

class StatsService
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }
    public function getStats()
    {
        $user = $this->getUsersCount();
        $ads = $this->getAdCount();
        $booking = $this->getBookingCount();
        $comment = $this->getCommentCount();

        return compact('user', 'ads', 'booking', 'comment');
    }
    public function getUsersCount()
    {
        return $this->manager->createQuery('SELECT COUNT(u) From App\Entity\User u')->getSingleScalarResult();
    }
    public function getAdCount()
    {
        return $this->manager->createQuery('SELECT COUNT(a) From App\Entity\Ad a')->getSingleScalarResult();

    }
    public function getBookingCount()
    {
        return $this->manager->createQuery('SELECT COUNT(a) From App\Entity\Booking a')->getSingleScalarResult();

    }
    public function getCommentCount()
    {
        return $ads = $this->manager->createQuery('SELECT COUNT(a) From App\Entity\Comment a')->getSingleScalarResult();

    }
    public function getAdsStats($order)
    {
        return $this->manager->createQuery(
            'SELECT AVG(c.rating) as note, a.title, a.id, u.firstName,u.lastName, u.picture
            FROM App\Entity\Comment c
            JOIN c.ad a
            JOIN a.author u
            GROUP BY a
            ORDER BY note ' . $order

        )->setMaxResults(5)->getResult();
    }

}
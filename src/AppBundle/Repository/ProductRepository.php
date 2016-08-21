<?php

namespace AppBundle\Repository;

use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductRepository as BaseRepository;
use Sylius\Component\Core\Model\ChannelInterface;

class ProductRepository extends BaseRepository
{
    public function findOneForSpecialOffer($productSlug, ChannelInterface $channel)
    {
        return $this->createQueryBuilder('o')
            ->innerJoin('o.taxons', 'taxon')
            ->andWhere('taxon.code = :code')
            ->innerJoin('o.channels', 'channel')
            ->andWhere('channel = :channel')
            ->andWhere('o.enabled = true')
            ->leftJoin('o.translations', 'translation')
            ->andWhere('translation.slug = :productSlug')
            ->setParameter('productSlug', $productSlug)
            ->setParameter('code', 'special-offer')
            ->setParameter('channel', $channel)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
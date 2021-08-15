<?php

namespace App\Controller;


use App\Entity\Collection;
use App\Entity\CollectionItem;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CollectionConroller extends AbstractController
{


    /**
     * @Route("/", name="app_homepage")
     */

    public function showCollection( EntityManagerInterface $entityManager)

    {

        $repository = $entityManager->getRepository(Collection::class);
        $collection = $repository->findAll();

        //dd($collection);

        return $this->render('CollectionShow/CollectionShow.html.twig', [
            'collection' => $collection,
        ]);

    }


    /**
     * @Route("/new-collection", name="app_new_collection")
     */

    public function createCollection(EntityManagerInterface $entityManager)

    {
        $collectionNew = new Collection();
        $collectionNew->setName('Books')
            ->setDescription('My Books Collection')
            ->setTheme('Detective');

        $entityManager->persist($collectionNew);
        $entityManager->flush();

        //dd($collectionNew);

        return $this->render('CollectionCreate/CollectionCreate.html.twig', [
        'collectionNew' => $collectionNew
        ]);
    }



    /**
     * @Route("/collection-item", name="app_collection_item")
     */

    public function showCollectionItem ()

    {


        //dd($collectionNew);

        return $this->render('ShowCollectionItem/showCollectionItem.html.twig', [

        ]);
    }



    /**
     * @Route("/new-collectionItem", name="app_new_collection")
     */

    public function createCollectionItem(EntityManagerInterface $entityManager)

    {
        $newCollectionItem = new CollectionItem();
        $newCollectionItem->setName('Jon Doe')
            ->setTag('Triller');

        dd($newCollectionItem);

        $entityManager->persist($newCollectionItem);
        $entityManager->flush();

        //dd($collectionNew);

        return $this->render('CollectionItemCreate/CollectionItemCreate.html.twig', [
            'newCollectionItem' => $newCollectionItem
        ]);
    }







}
<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\ShoppingCart;
use App\Entity\User;
use App\Form\EditProductType;
use App\Form\EditUserType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

/**
 * Contrlôleur qui gère les pages d'administration
 * Permet d'ajouter, de modifier ou de supprimer des produits et des utilisateurs
 */

class AdminController extends AbstractController
{
    /**
     * Méthode qui affiche la page des utilisateurs en tant qu'administrateur avec une option de recherche
     *
     * @param Request $request Requête
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     *
     * @return Response Page admin
     */

    #[Route('/admin/users', name: 'app_admin_users')]
    #[isGranted("ROLE_ADMIN")]
    public function allUsers(Request $request, EntityManagerInterface $entityManager): Response
    {
        $searchQuery = $request->query->get('search');
        if ($searchQuery !== null) {
            $userRepository = $entityManager->getRepository(User::class);

            $users = $userRepository->findUserByName($searchQuery);
        } else {
            $userRepository = $entityManager->getRepository(User::class);
            $users = $userRepository->findAll();
        }
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'users' => $users
        ]);
    }


    /**
     * Méthode qui affiche la page des produits en tant qu'administrateur
     *
     * @param Request $request Requête
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     *
     * @return Response Page admin
     */

    #[Route('/admin/products', name: 'app_admin_products')]
    #[isGranted("ROLE_ADMIN")]
    public function allProducts(Request $request, EntityManagerInterface $entityManager): Response
    {
        $searchQuery = $request->query->get('search');
        if ($searchQuery !== null) {
            $productRepository = $entityManager->getRepository(Product::class);
            $products = $productRepository->findArticlesByName($searchQuery);
        } else {
            $productRepository = $entityManager->getRepository(Product::class);
            $products = $productRepository->findAll();
        }
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'produits' => $products
        ]);
    }


    /**
     * Méthode qui permet de modifier un utilisateur
     *
     * @param User $user Utilisateur
     * @param Request $request Requête
     * @param UserPasswordHasherInterface $userPasswordHasher Hasher de mot de passe
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     */

    #[Route('/admin/users/edit/{id}', name: 'app_admin_edit_user')]
    #[isGranted("ROLE_ADMIN")]
    public function editUser(User $user, Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager)
    {

        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('message', 'Utilisateur modifié avec succès');
            return $this->redirectToRoute('app_admin_users');
        }

        return $this->render('admin/edituser.html.twig', [
            'userForm' => $form->createView(),
            'add' => false
        ]);
    }

    /**
     * Méthode qui permet de supprimer un utilisateur
     *
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     * @param int $id id de l'utilisateur à supprimer
     */

    #[Route('/admin/users/delete/{id}', name: 'app_admin_delete_user')]
    #[isGranted("ROLE_ADMIN")]
    public function deleteUser(EntityManagerInterface $entityManager, int $id)
    {
        $user = $entityManager->getRepository(User::class)->find($id);
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_admin_users');
    }


    /**
     * Méthode qui permet d'ajouter un utilisateur
     *
     * @param Request $request Requête
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     * @param UserPasswordHasherInterface $userPasswordHasher Hasher de mot de passe
     *
     * @return Response Page admin
     */

    #[Route('/admin/user/add/', name: 'app_admin_add_user')]
    #[isGranted("ROLE_ADMIN")]
    public function addUser(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $user = new User();
        $panier = new ShoppingCart();
        $form = $this->createForm(EditUserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setFirstName($form->get('firstName')->getData());
            $user->setLastName($form->get('lastName')->getData());
            $user->setEmail($form->get('email')->getData());
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
            $user->setRoles(array('ROLE_USER'));
            $user->setPhoneNumber($form->get('phoneNumber')->getData());
            $user->setShoppingCart($panier);

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_users');
        }

        return $this->render('admin/edituser.html.twig', [
            'userForm' => $form->createView(),
            'add' => true
        ]);
    }


    /**
     * Méthode qui permet de supprimer un produit
     *
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     * @param int $id id du produit à supprimer
     */


    #[Route('/admin/products/delete/{id}', name: 'app_admin_delete_product')]
    #[isGranted("ROLE_ADMIN")]
    public function deleteProduct(EntityManagerInterface $entityManager, int $id)
    {
        $produits = $entityManager->getRepository(Product::class)->find($id);
        $nomImage = $produits->getPhoto();

        $entityManager->remove($produits);
        $entityManager->flush();

        $chemin= realpath($this->getParameter('kernel.project_dir').'/public/');
        $chemin= $chemin.'/'.$nomImage;
        if (file_exists($chemin)) {
            unlink($chemin);
        }

        return $this->redirectToRoute('app_admin_products');
    }


    /**
     * Méthode qui permet d'ajouter un utilisateur
     *
     * @param Product $product Produit à modifier
     * @param Request $request Requête
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     */

    #[Route('/admin/products/edit/{id}', name: 'app_admin_edit_product')]
    #[isGranted("ROLE_ADMIN")]
    public function editProduct(Product $product, Request $request, EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(EditProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            if ($form->get('photo')->getData()) {
                $image = $form->get('photo')->getData();
                $chemin = realpath($this->getParameter('kernel.project_dir').'/public/Image');

                $nouveauNomFichier = md5(uniqid()).'.'.$image->guessExtension();
                $image->move($chemin,$nouveauNomFichier);

                $oldphoto = $product->getPhoto();
                $product->setPhoto('Image/'.$nouveauNomFichier);
                $chemin = realpath($this->getParameter('kernel.project_dir').'/public/');
                $chemin= $chemin.'/'.$oldphoto;
                if (file_exists($chemin)) {
                    unlink($chemin);
                }

            } else {
                $product->setPhoto($formData->getPhoto());
            }

            $entityManager->persist($product);
            $entityManager->flush();
            $this->addFlash('message', 'Produit modifié avec succès');
            return $this->redirectToRoute('app_admin_products');
        }

        return $this->render('admin/editproduct.html.twig', [
            'productForm' => $form->createView(),
            'add' => false
        ]);
    }


    /**
     * Méthode qui permet d'ajouter un produit
     *
     * @param Request $request Requête
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     *
     * @return Response
     */

    #[Route('/admin/products/add/', name: 'app_admin_add_product')]
    #[isGranted("ROLE_ADMIN")]
    public function addProduct(Request $request, EntityManagerInterface $entityManager): Response
    {
        $product = new Product();
        $form = $this->createForm(EditProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $product->setName($form->get('name')->getData());
            $product->setDescription($form->get('description')->getData());
            $product->setQuantity($form->get('quantity')->getData());
            $product->setPrice($form->get('price')->getData());
            $product->setBrand($form->get('brand')->getData());

            $image = $form->get('photo')->getData();
            $chemin = realpath($this->getParameter('kernel.project_dir').'/public/Image');

            $nouveauNomFichier = md5(uniqid()).'.'.$image->guessExtension();
            $image->move($chemin,$nouveauNomFichier);
            $product->setPhoto('Image/'.$nouveauNomFichier);


            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_products');
        }

        return $this->render('admin/editproduct.html.twig', [
            'productForm' => $form->createView(),
            'add' => true
        ]);
    }
}

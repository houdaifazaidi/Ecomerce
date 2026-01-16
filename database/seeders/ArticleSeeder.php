<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'fournitures' => [
                [
                    'nom' => 'Stylo Bleu Gel',
                    'prix' => 2.50,
                    'description' => 'Stylo gel premium avec grip confortable',
                    'image' => 'https://fournishop.ma/41025-large_default/stylo-gel-deli-eg64-bl.jpg',
                ],
                [
                    'nom' => 'Cahier A4 Ligné',
                    'prix' => 8.99,
                    'description' => 'Cahier 200 pages, papier qualité',
                    'image' => 'https://d3b8u2qnhxi7re.cloudfront.net/img/it3775_spiral_recycled_cardboard_with_colored_stripe_and_pen_product_c.jpg.jpg',
                ],
                [
                    'nom' => 'Classeur Plastique',
                    'prix' => 5.50,
                    'description' => 'Classeur 2 anneaux résistant',
                    'image' => 'https://reperstore.net/128-large_default/classeur-a-anneaux-plastifie-8-cm.jpg',
                ],
                [
                    'nom' => 'Post-it Notes',
                    'prix' => 3.25,
                    'description' => 'Bloc 100 feuilles repositionnables',
                    'image' => 'https://cdnimg.webstaurantstore.com/images/products/large/321103/1266618.jpg',
                ],
                [
                    'nom' => 'Marqueurs Colorés',
                    'prix' => 12.99,
                    'description' => 'Set de 24 marqueurs permanents',
                    'image' => 'https://bestplace.mg/4826-large_default/marquer-double-pointe-trousse-40c.jpg',
                ],
                [
                    'nom' => 'Agrafeuse Électrique',
                    'prix' => 45.00,
                    'description' => 'Agrafeuse électrique automatique',
                    'image' => 'https://media.castorama.fr/is/image/Castorama/agrafeuse-electrique-a-batterie-rapid-btx10-sans-fil~4051661037504_01c_FR_CF?$MOB_PREV$&$width=768&$height=768',
                ],
            ],

            'mobilier' => [
                [
                    'nom' => 'Chaise Bureau Ergonomique',
                    'prix' => 199.99,
                    'description' => 'Chaise avec support lombaire ajustable',
                    'image' => 'https://bigoffice.ma/wp-content/uploads/2024/05/Chaise-de-bureau-ergonomique-en-mesh-noir-avec-accoudoirs-reglables-et-roulettes-1.png',
                ],
                [
                    'nom' => 'Bureau Moderne',
                    'prix' => 349.99,
                    'description' => 'Bureau 120x60cm en mélaminé blanc',
                    'image' => 'https://decoexpress.ma/cdn/shop/files/Captured_ecran2023-11-14a12.29.44_1500x.png?v=1699965219',
                ],
                [
                    'nom' => 'Étagère Murale',
                    'prix' => 89.99,
                    'description' => 'Étagère 3 niveaux, charge 25kg',
                    'image' => 'https://cdn.gautier.fr/media/cache/global_landscape_xs/uploads/pim/9681fd4ec72b2bedceb45a4bf06a87cb.jpg',
                ],
                [
                    'nom' => 'Lampe de Bureau LED',
                    'prix' => 34.50,
                    'description' => 'Lampe LED dimmable avec bras articulé',
                    'image' => 'https://www.bricodeco.ma/media/catalog/product/cache/b9634a378be9811ea8f632854ac2a8ad/7/3/73754.jpg',
                ],
                [
                    'nom' => 'Rangement 4 Tiroirs',
                    'prix' => 129.99,
                    'description' => 'Meuble de rangement avec roulettes',
                    'image' => 'https://cdn.shoplightspeed.com/shops/624785/files/46016530/sylvia-design-meuble-de-rangement-4-tiroirs-sylvia.jpg',
                ],
                [
                    'nom' => 'Tapis Bureau Antifatigue',
                    'prix' => 49.99,
                    'description' => 'Tapis ergonomique pour position debout',
                    'image' => 'https://www.axess-industries.com/ergonomie-du-bureau/tapis-antifatigue-de-bureau-p-180082-450x450.jpg',
                ],
            ],
        ];

        foreach ($data as $categorie => $produits) {
            foreach ($produits as $produit) {
                Article::create([
                    'nom'         => $produit['nom'],
                    'prix'        => $produit['prix'],
                    'description' => $produit['description'],
                    'categorie'   => $categorie,
                    'image'       => $produit['image'],
                    'solde'       => 0,
                ]);
            }
        }
    }
}

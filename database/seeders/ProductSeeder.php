<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['id' => 1, 'title' => 'Sheer Linen Drapes', 'category' => 'Curtains', 'image' => '/assets/Images/curtains/ana-terenti-oHD_pmaweGI-unsplash.jpg', 'description' => 'Elegant light-filtering curtains for living rooms.'],
            ['id' => 2, 'title' => 'Royal Velvet Blackout', 'category' => 'Curtains', 'image' => '/assets/Images/curtains/ann-ann-bnd3bkhTng4-unsplash.jpg', 'description' => 'Heavy velvet curtains for maximum privacy and luxury.'],
            ['id' => 101, 'title' => 'Belgian Flax Linen', 'category' => 'Curtains', 'image' => '/assets/Images/curtains/doug-vos-eIMoXT64gzo-unsplash.jpg', 'description' => 'Premium stonewashed linen in natural earth tones.'],
            ['id' => 102, 'title' => 'Silk Taffeta Panels', 'category' => 'Curtains', 'image' => '/assets/Images/curtains/jon-tyson-SlpsgiZsSNk-unsplash.jpg', 'description' => 'Luxurious silk with a crisp texture and slight sheen.'],
            ['id' => 103, 'title' => 'Cotton Canvas Grommet', 'category' => 'Curtains', 'image' => '/assets/Images/curtains/kevindous-BIxFQyH7f_4-unsplash.jpg', 'description' => 'Durable, casual drapes perfect for family rooms.'],
            ['id' => 104, 'title' => 'Embroidered Sheer Overlay', 'category' => 'Curtains', 'image' => '/assets/Images/curtains/lasse-moller-JOSGjytOJnI-unsplash.jpg', 'description' => 'Delicate floral embroidery on transparent voile.'],
            ['id' => 105, 'title' => 'Thermal Insulated Weave', 'category' => 'Curtains', 'image' => '/assets/Images/curtains/lee-sangmyeong-HSlZK-B1gf8-unsplash.jpg', 'description' => 'Energy-saving curtains that regulate room temperature.'],
            ['id' => 106, 'title' => 'Pinch Pleat Velvet', 'category' => 'Curtains', 'image' => '/assets/Images/curtains/lynn-nncR7OBCeCI-unsplash.jpg', 'description' => 'Traditional pleated header for a formal aesthetic.'],
            ['id' => 107, 'title' => 'Bohemian Macrame', 'category' => 'Curtains', 'image' => '/assets/Images/curtains/marlon-correa-xBbniCVT7bU-unsplash.jpg', 'description' => 'Hand-knotted cotton texture for eclectic spaces.'],
            ['id' => 108, 'title' => 'French Pleat Damask', 'category' => 'Curtains', 'image' => '/assets/Images/curtains/mathias-reding-mKnUdUXkrOM-unsplash.jpg', 'description' => 'Opulent patterned drapes for grand dining rooms.'],
            ['id' => 3, 'title' => 'Motorized Roller Blinds', 'category' => 'Blinds', 'image' => '/assets/Images/blinds/barbare-kacharava-aEaELqhaVZM-unsplash.jpg', 'description' => 'Smart remote-controlled blinds for modern homes.'],
            ['id' => 4, 'title' => 'Wooden Venetian', 'category' => 'Blinds', 'image' => '/assets/Images/blinds/brett-jordan-te1xKPEzzsA-unsplash.jpg', 'description' => 'Classic timber slats for warm, natural lighting control.'],
            ['id' => 201, 'title' => 'Honeycomb Cellular Shades', 'category' => 'Blinds', 'image' => '/assets/Images/blinds/darren-richardson-9epGsXo_VdI-unsplash.jpg', 'description' => 'Energy-efficient shades that trap air for insulation.'],
            ['id' => 202, 'title' => 'Vertical Fabric Blinds', 'category' => 'Blinds', 'image' => '/assets/Images/blinds/nicolas-solerieu--Y4SQToPCYU-unsplash.jpg', 'description' => 'Ideal for large sliding glass doors and windows.'],
            ['id' => 203, 'title' => 'Aluminum Mini Blinds', 'category' => 'Blinds', 'image' => '/assets/Images/blinds/valentin-zL8zuysiS5I-unsplash.jpg', 'description' => 'Sleek, durable, and moisture-resistant for bathrooms.'],
            ['id' => 204, 'title' => 'Roman Shades - Linen', 'category' => 'Blinds', 'image' => '/assets/Images/blinds/barbare-kacharava-aEaELqhaVZM-unsplash.jpg', 'description' => 'Soft fabric folds that stack neatly when raised.'],
            ['id' => 205, 'title' => 'Bamboo Roll-Up', 'category' => 'Blinds', 'image' => '/assets/Images/blinds/brett-jordan-te1xKPEzzsA-unsplash.jpg', 'description' => 'Eco-friendly textured blinds for a tropical feel.'],
            ['id' => 206, 'title' => 'Zebra Dual Sheer', 'category' => 'Blinds', 'image' => '/assets/Images/blinds/darren-richardson-9epGsXo_VdI-unsplash.jpg', 'description' => 'Alternating sheer and solid bands for flexible light control.'],
            ['id' => 207, 'title' => 'Solar Screen Shades', 'category' => 'Blinds', 'image' => '/assets/Images/blinds/nicolas-solerieu--Y4SQToPCYU-unsplash.jpg', 'description' => 'UV protection while maintaining your view outside.'],
            ['id' => 208, 'title' => 'Faux Wood Plantation', 'category' => 'Blinds', 'image' => '/assets/Images/blinds/valentin-zL8zuysiS5I-unsplash.jpg', 'description' => 'Moisture-resistant shutters with a classic white finish.'],
            ['id' => 5, 'title' => 'Oak Engineered Wood', 'category' => 'Flooring', 'image' => '/assets/Images/flooring/daniel-barnes-z0VlomRXxE8-unsplash.jpg', 'description' => 'Durable and authentic real wood top layer flooring.'],
            ['id' => 6, 'title' => 'Herringbone Laminate', 'category' => 'Flooring', 'image' => '/assets/Images/flooring/mateus-campos-felipe-vlKzPiD6XuI-unsplash.jpg', 'description' => 'Classic pattern with modern durability and ease of care.'],
            ['id' => 301, 'title' => 'Luxury Vinyl Plank - Walnut', 'category' => 'Flooring', 'image' => '/assets/Images/flooring/pexels-kseniachernaya-3965514.jpg', 'description' => 'Waterproof planks resembling rich dark walnut wood.'],
            ['id' => 302, 'title' => 'Solid Teak Parquet', 'category' => 'Flooring', 'image' => '/assets/Images/flooring/pexels-muharrem-alper-428087426-15585982.jpg', 'description' => 'Timeless geometric patterns in durable teak.'],
            ['id' => 303, 'title' => 'Polished Marble Tile', 'category' => 'Flooring', 'image' => '/assets/Images/flooring/steven-wong-Eueq2kX2eFY-unsplash.jpg', 'description' => 'High-gloss Carrara marble for luxurious entryways.'],
            ['id' => 304, 'title' => 'Berber Wool Carpet', 'category' => 'Flooring', 'image' => '/assets/Images/flooring/daniel-barnes-z0VlomRXxE8-unsplash.jpg', 'description' => 'Soft, looped texture perfect for comfortable bedrooms.'],
            ['id' => 305, 'title' => 'Rustic Reclaimed Pine', 'category' => 'Flooring', 'image' => '/assets/Images/flooring/mateus-campos-felipe-vlKzPiD6XuI-unsplash.jpg', 'description' => 'Weathered look with distinct knots and grain character.'],
            ['id' => 306, 'title' => 'Chevron Pattern Oak', 'category' => 'Flooring', 'image' => '/assets/Images/flooring/pexels-kseniachernaya-3965514.jpg', 'description' => 'French-style chevron layout in light oak finish.'],
            ['id' => 307, 'title' => 'Cork Flooring Tiles', 'category' => 'Flooring', 'image' => '/assets/Images/flooring/pexels-muharrem-alper-428087426-15585982.jpg', 'description' => 'Sustainable, soft underfoot, and sound-absorbing.'],
            ['id' => 308, 'title' => 'Slate Stone Tiles', 'category' => 'Flooring', 'image' => '/assets/Images/flooring/steven-wong-Eueq2kX2eFY-unsplash.jpg', 'description' => 'Natural textured stone, perfect for kitchens and patios.'],
            ['id' => 7, 'title' => 'Textured Damask', 'category' => 'Wallpaper', 'image' => '/assets/Images/Wallpaper/gaya-si--rwd4zUCDBY-unsplash.jpg', 'description' => 'Subtle embossed patterns for feature walls.'],
            ['id' => 8, 'title' => 'Botanical Print', 'category' => 'Wallpaper', 'image' => '/assets/Images/Wallpaper/jon-tyson-7aR3WHjdSpA-unsplash.jpg', 'description' => 'Fresh nature-inspired designs for bedrooms.'],
            ['id' => 401, 'title' => 'Art Deco Geometric', 'category' => 'Wallpaper', 'image' => '/assets/Images/Wallpaper/kriti-jogi-A5iOVlzEilU-unsplash.jpg', 'description' => 'Bold gold lines on dark backgrounds for drama.'],
            ['id' => 402, 'title' => 'Metallic Grasscloth', 'category' => 'Wallpaper', 'image' => '/assets/Images/Wallpaper/lance-reis-Y_YJFbLju6I-unsplash.jpg', 'description' => 'Natural fibers woven with metallic threads.'],
            ['id' => 403, 'title' => 'Vintage Floral Mural', 'category' => 'Wallpaper', 'image' => '/assets/Images/Wallpaper/thanos-pal-9OZfTe-y5T4-unsplash.jpg', 'description' => 'Large-scale blooming flowers for a statement wall.'],
            ['id' => 404, 'title' => 'Minimalist Stripe', 'category' => 'Wallpaper', 'image' => '/assets/Images/Wallpaper/gaya-si--rwd4zUCDBY-unsplash.jpg', 'description' => 'Clean lines to add height and order to a room.'],
            ['id' => 405, 'title' => 'Textured Concrete Look', 'category' => 'Wallpaper', 'image' => '/assets/Images/Wallpaper/jon-tyson-7aR3WHjdSpA-unsplash.jpg', 'description' => 'Industrial chic aesthetic without the coldness.'],
            ['id' => 406, 'title' => 'Watercolor Abstract', 'category' => 'Wallpaper', 'image' => '/assets/Images/Wallpaper/kriti-jogi-A5iOVlzEilU-unsplash.jpg', 'description' => 'Soft washes of color for a calming artistic vibe.'],
            ['id' => 407, 'title' => 'Classic Toile de Jouy', 'category' => 'Wallpaper', 'image' => '/assets/Images/Wallpaper/lance-reis-Y_YJFbLju6I-unsplash.jpg', 'description' => 'Traditional pastoral scenes in monochrome.'],
            ['id' => 408, 'title' => 'Midnight Blue Gold Foil', 'category' => 'Wallpaper', 'image' => '/assets/Images/Wallpaper/thanos-pal-9OZfTe-y5T4-unsplash.jpg', 'description' => 'Luxurious deep blue with shimmering gold accents.'],
            ['id' => 9, 'title' => 'Pleated Sliding Mesh', 'category' => 'Mosquito Nets', 'image' => '/assets/Images/mosquito nets/rectangular-mosquito-net-for-2-persons-the-kasih-quadra-www-nusarah-com-scaled.jpg', 'description' => 'Space-saving retractable nets for balconies.'],
        ];

        foreach ($products as $product) {
            $imageContent = null;
            $path = public_path($product['image']);
            if (File::exists($path)) {
                $imageContent = File::get($path);
            }

            Product::updateOrCreate(
                ['id' => $product['id']],
                [
                    'title' => $product['title'],
                    'category' => $product['category'],
                    'image' => $imageContent,
                    'description' => $product['description'],
                ]
            );
        }
    }
}

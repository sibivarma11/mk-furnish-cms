<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Http;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'id' => 1,
                'name' => "Eleanor Vance",
                'role' => "Architect",
                'content' => "MK Furnish has been my go-to for residential projects. Their attention to detail in curtain fabrication is unmatched in the city.",
                'image' => "https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&q=80&w=200&h=200"
            ],
            [
                'id' => 2,
                'name' => "Julian H.",
                'role' => "Homeowner",
                'content' => "The wooden flooring installation was flawless. The team was professional, clean, and finished ahead of schedule. Truly premium service.",
                'image' => "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=200&h=200"
            ],
            [
                'id' => 3,
                'name' => "Sophia M.",
                'role' => "Interior Designer",
                'content' => "I appreciate their vast collection of wallpapers. It makes sourcing for eclectic client tastes so much easier.",
                'image' => "https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=200&h=200"
            ],
            [
                'id' => 4,
                'name' => "Marcus T.",
                'role' => "Hospitality Manager",
                'content' => "We outfitted our entire boutique hotel with motorized blinds from MK Furnish. The support team was incredible from start to finish.",
                'image' => "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&q=80&w=200&h=200"
            ],
            [
                'id' => 5,
                'name' => "Isabella R.",
                'role' => "Art Curator",
                'content' => "The sheer linens add such a soft, ethereal quality to my gallery space. They understood exactly the lighting I needed to protect the art.",
                'image' => "https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&q=80&w=200&h=200"
            ],
            [
                'id' => 6,
                'name' => "David Chen",
                'role' => "Property Developer",
                'content' => "Reliability is key in my business. MK Furnish delivered high-quality mosquito nets for our new complex on time and within budget.",
                'image' => "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&q=80&w=200&h=200"
            ]
        ];

        foreach ($testimonials as $testimonial) {
            $imageContent = null;
            try {
                $imageContent = Http::get($testimonial['image'])->body();
            } catch (\Exception $e) {
                // Handle error or skip image
            }

            Testimonial::updateOrCreate(
                ['id' => $testimonial['id']],
                [
                    'name' => $testimonial['name'],
                    'role' => $testimonial['role'],
                    'rating' => 5,
                    'content' => $testimonial['content'],
                    'image' => $imageContent,
                ]
            );
        }
    }
}

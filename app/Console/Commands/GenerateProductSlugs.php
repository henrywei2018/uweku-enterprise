<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateProductSlugs extends Command
{
    protected $signature = 'products:generate-slugs';
    protected $description = 'Generate slugs for existing products';

    public function handle()
    {
        $products = Product::whereNull('slug')->orWhere('slug', '')->get();
        $count = 0;

        foreach ($products as $product) {
            $baseSlug = Str::slug($product->name);
            $slug = $baseSlug;
            $counter = 1;
            
            // Make sure slug is unique
            while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }
            
            $product->slug = $slug;
            $product->save();
            $count++;
        }

        $this->info("Generated slugs for {$count} products.");
        return Command::SUCCESS;
    }
}
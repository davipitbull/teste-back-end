<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\Produto;

class ImportProducts extends Command
{
    protected $signature = 'products:import {--id=}';

    protected $description = 'Import products from an external API';

    public function handle()
    {
        $productId = $this->option('id');

        if ($productId) {
            // Importar um único produto com base no ID
            $product = $this->importSingleProduct($productId);
            $this->info("Product imported: {$product->name}");
        } else {
            // Importar todos os produtos
            $products = $this->importAllProducts();
            $this->info("{$products->count()} products imported.");
        }
    }

    private function importAllProducts()
    {
        $client = new Client();
        $response = $client->get('https://fakestoreapi.com/products');
        $data = json_decode($response->getBody(), true);

        foreach ($data as $item) {
            Produto::create([
                'name' => $item['title'],
                'price' => $item['price'],
                'description' => $item['description'],
                'category' => $item['category'],
                'image_url' => $item['image'],
            ]);
        }

        return Produto::all();
    }

    private function importSingleProduct($productId)
    {
        $client = new Client();
        $response = $client->get("https://fakestoreapi.com/products/{$productId}");
        $data = json_decode($response->getBody(), true);

        return Produto::create([
            'name' => $data['title'],
            'price' => $data['price'],
            'description' => $data['description'],
            'category' => $data['category'],
            'image_url' => $data['image']
        ]);
    }
}
